<?php

namespace App\Http\Manager;

use App\Http\Entity\OrderEntity;
use App\Order;
use App\OrderItem;
use App\Restaurant;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class OrderManager implements ManagerInterface
{
    const WAITING_STATUS = 'waiting';
    const APPROVED_STATUS = 'approved';
    const REJECTED_STATUS = 'rejected';

    // methods for Order List

    public function getOrderList()
    {
        $orders = Order::with('orderItems')
            ->where('user_id', Auth::user()->getAuthIdentifier())->get();
        
        $orderList = [];
        foreach ($orders as $order) {
            $order = self::map($order);
            $orderList[] = [
                'id' => $order->getId(),
                'customerAddressId' => $order->getCustomerAddressId(),
                'orderItems' => $order->getOrderItems(),
                'restaurantId' => $order->getRestaurantId(),
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

        return Order::with('orderItem')
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->get();
    }

    public function updateOrder($id, $data)
    {
        $order = Order::findOrFail($id);
        $managerMap = (array)$this->map($data);
        $order->update($managerMap);

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
        $orderEntity->setUserId($db['user_id']);
        $orderEntity->setCustomerAddressId($db['customer_address_id']);
        $orderEntity->setRestaurantId($db['restaurant_id']);
        $orderEntity->setStatus($db['status']);
        $orderEntity->setOrderItems($db['orderItems']);

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