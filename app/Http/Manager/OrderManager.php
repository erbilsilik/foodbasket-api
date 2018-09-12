<?php

namespace App\Http\Manager;

use App\CustomerAddress;
use App\Http\Entity\FoodEntity;
use App\Http\Entity\OrderEntity;
use App\Http\Entity\OrderItemEntity;
use App\Jobs\SendOrderEmail;
use App\Order;
use App\OrderItem;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Mockery\Exception;
use \MongoDB\Driver\BulkWrite;

class OrderManager implements ManagerInterface
{
    const WAITING_STATUS = 'waiting';
    const APPROVED_STATUS = 'approved';
    const REJECTED_STATUS = 'rejected';

    // methods for Order List

    public function getOrderList()
    {
        $orders = Order::with('restaurant', 'user', 'orderItems')
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->get();
        $orderList = [];
        foreach ($orders as $order) {
            $order = self::map($order);
            $orderList[] = [
                'id' => $order->getId(),
                'customerAddressId' => $order->getCustomerAddressId(),
                'orderItems' => $order->getOrderItems(),
                'restaurantId' => $order->getRestaurantId(),
                'restaurant' => $order->getRestaurant(),
                'customerAddress' => $order->getCustomerAddress(),
                'status' => $order->getStatus()
            ];
        }

        return $orderList;

    }

    // methods for Order Add

    /**
     * @param OrderEntity $order
     * @return Order[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     * @throws \Exception
     */
    public function addOrder(OrderEntity $order)
    {

        $rawOrder = $this->saveOrder($order);

        if ($rawOrder) {
            $savedOrder = Order::with('orderItems', 'orderItems.food')
                ->where('id', $rawOrder->id)
                ->first();
            $savedOrder['customer_address'] = CustomerAddress::where('id', $rawOrder['customer_address_id'])->first();
            $savedOrder['user'] = User::where('id', Auth::user()->getAuthIdentifier())->first();
            $savedOrder['restaurant_id'] = $rawOrder->restaurant_id;
            $this->publishOrder($this->map($savedOrder));

            return Order::with('orderItems')
                ->where('user_id', Auth::user()->getAuthIdentifier())
                ->get();
        }

        throw new \DummyException('error');
    }

    public function calculateOrderTotal(OrderEntity $order)
    {
        $total = 0;
        $foods = [];
        foreach ($order->getOrderItems() as $item) {
            $total += $item->getPrice() * $item->getAmount();
            $foods[$item->getFood()->getName()] = [
                'totalAmount' => $item->getAmount(),
                'itemTotalPrice' => $item->getPrice() * $item->getAmount()
            ];
        }

        return [
            'totalPrice' => $total,
            'foods' => $foods
            ];
    }

    public function publishOrder(OrderEntity $order)
    {
        $calculate = $this->calculateOrderTotal($order);
        $mongo = Mongo::get();
        $bulk = new BulkWrite();
        $publishData = [
            'total' => $calculate['totalPrice'],
            'foodInformation' => $calculate['foods'],
            'orderNumber' => $order->getId(),
            'customerFirstName' => $order->getUser()->getFirstName(),
            'customerLastName' => $order->getUser()->getLastName(),
            'customerPhoneNumber' => $order->getUser()->getPhoneNumber(),
            'orderAddress' => $order->getCustomerAddress()->getAddress(),
            'status' => $order->getStatus()
        ];
        $bulk->insert($publishData);

        $mongo->executeBulkWrite('information.orderInformation', $bulk);
        Redis::publish('restaurant_id.5' , json_encode($publishData));

        // TODO save published order to Mongo DB
    }

    public function updateOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->update($order);

        return $order;
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
    }

    public function map($db)
    {
        $orderEntity = new OrderEntity();
        $orderEntity->setId($db->id);
        $orderEntity->setCustomerId($db->user_id);
        $orderEntity->setCustomerAddressId($db->customer_address_id);
        $orderEntity->setRestaurantId($db->restaurant_id);
        $orderEntity->setCustomerAddress($db->customer_address);
        $orderEntity->setStatus($db['status']); // ??

        $orderItems = [];
        foreach ($db->orderItems as $item) {
            $orderItemEntity = new OrderItemEntity();
            $orderItemEntity->setId($item->id);
            $orderItemEntity->setFoodId($item->food_id);
            $orderItemEntity->setOrderId($item->order_id);
            $orderItemEntity->setAmount($item->amount);
            $orderItemEntity->setPrice($item->price);

            $foodEntity = new FoodEntity();
            $foodEntity->setName($item->food->name);
            $foodEntity->setRestaurantId($item->food->restaurant_id);
            $foodEntity->setDetail($item->food->detail);
            $foodEntity->setImg($item->food->img);
            $foodEntity->setPrice($item->food->price);
            $orderItemEntity->setFood($foodEntity ?? null);
            $orderItems[] = $orderItemEntity;
        }
        $orderEntity->setOrderItems($orderItems);

        if (isset($db->user)) {
            $userManager = new UserManager();
            $orderEntity->setUser($userManager->map($db->user));
        }

        if (isset($db->customer_address)) {
            $customerAddressManager = new CustomerAddressManager();
            $orderEntity->setCustomerAddress($customerAddressManager->map($db->customer_address));
        }

        return $orderEntity;
    }

    public function mapExternal($post)
    {
        $orderEntity = new OrderEntity();
        if (isset($post['customerAddressId'])) {
            $orderEntity->setCustomerAddressId($post['customerAddressId']);
        }
        if (empty($post['customerAddressId'])) {
            throw new Exception('Customer address id not found');
        }
        if (isset($post['restaurantId'])) {
            $orderEntity->setRestaurantId($post['restaurantId']);
        }
        if (empty($post['restaurantId'])) {
            throw new Exception('Restaurant id not found');
        }
        if (isset($post['status'])) {
            $orderEntity->setStatus($post['status']);
        }
        if (empty($post['status'])) {
            throw new Exception('Status not found');
        }

        if (isset($post['orderItems'])) {
            $orderEntity->setOrderitems($post['orderItems']);
        }
        if (empty($post['orderItems'])) {
            throw new Exception('OrderItems not found');
        }

        return $orderEntity;
    }

    public function saveOrder(OrderEntity $order)
    {
        if ($rawOrder = Order::create([
            'user_id' => Auth::user()->getAuthIdentifier(),
            'restaurant_id' => $order->getRestaurantId(),
            'customer_address_id' => $order->getCustomerAddressId(),
            'status' => $order->getStatus()
        ])) {
            $orderItems = [];
            if ($rawOrder instanceof Order) {
                foreach ($order->getOrderitems() as $key => $value) {
                    $value['order_id'] = $rawOrder['id'];
                    $orderItem = OrderItem::create($value);
                    if ($orderItem instanceof OrderItem) {
                        $orderItems[] = $orderItem;
                    }
                }
            }

            return $rawOrder;
        }

        return false;
    }
}