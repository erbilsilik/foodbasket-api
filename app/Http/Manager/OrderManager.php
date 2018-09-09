<?php

namespace App\Http\Manager;

use App\CustomerAddress;
use App\Food;
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
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function addOrder(OrderEntity $order)
    {
        $rawOrder = Order::create([
            'user_id' => Auth::user()->getAuthIdentifier(),
            'restaurant_id' => $order->getRestaurantId(),
            'customer_address_id' => $order->getCustomerAddressId(),
            'status' => $order->getStatus()
        ]);

        // INSERT to order items table
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

        // Publish in channel

        $savedOrder = Order::with('orderItems', 'orderItems.food')
            ->where('id',  $rawOrder->id)
            ->first();

        $savedOrder->customer_address = CustomerAddress::where('id', $rawOrder['customer_address_id'])->first();
        $customerAddressManager = new CustomerAddressManager();
        $savedOrder->customer_address = $customerAddressManager->map($savedOrder->customer_address);


        $savedOrder->user = User::where('id', Auth::user()->getAuthIdentifier())->first();

        // TODO map also for the user after transforming User entity variable's to camelCase
        // $user = new UserManager();
        // $savedOrder->user = $user->map($savedOrder->user);


        // TODO map also for food in orderItems and seperate publish method from addOrder method


        Redis::publish('restaurant_id.' . $order->getRestaurantId(), $savedOrder);

        return Order::with('orderItems')
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->get();
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
        $orderEntity->setId($db['id']);
        $orderEntity->setCustomerId($db['user_id']);
        $orderEntity->setCustomerAddressId($db['customer_address_id']);
        $orderEntity->setRestaurantId($db['restaurant_id']);
//        $orderEntity->setRestaurant($db['restaurant']);
        $orderEntity->setCustomerAddress($db['customer_address']);
        $orderEntity->setStatus($db['status']);

        $orderItems = [];

        foreach ($db->orderItems as $item) {
            $orderItemEntity = new OrderItemEntity();
            $orderItemEntity->setId($item->id);
            $orderItemEntity->setFoodId($item->food_id);
            $orderItemEntity->setOrderId($item->order_id);
            $orderItemEntity->setAmount($item->amount);
            $orderItemEntity->setPrice($item->price);
            $orderItemEntity->setFood($item->food);

//            foreach ($item->food as $food) {
//                $foodEntity = new FoodEntity();
//                $foodEntity->setName($food['name']);
//                $foodEntity->setRestaurantId($food['restaurant_id']);
//                $foodEntity->setDetail($food['detail']);
//                $foodEntity->setImg($food['img']);
//                $foodEntity->setPrice($food['price']);
//
//                $item->food = $foodEntity;
//
//                dd($item->food);
//            }

            $orderItems[] = $orderItemEntity;

        }

        $orderEntity->setOrderItems($orderItems);

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
}