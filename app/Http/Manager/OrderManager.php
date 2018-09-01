<?php

namespace App\Http\Manager;

use App\Http\Entity\OrderEntity;
use App\Order;
use App\OrderItem;
use App\Restaurant;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class OrderManager implements ManagerInterface
{
    // methods for Order List

    public function getOrderList()
    {
        return Order::where('user_id', Auth::user()->getAuthIdentifier())
            ->get();

    }

    // methods for Order Add

    public function addOrder($order)
    {
        $orderTable = [];
        $orderTable['user_id'] = Auth::user()->getAuthIdentifier();
        $orderTable['restaurant_id'] = $order['restaurantId'];
        $orderTable['customer_address_id'] = $order['customerAddressId'];
        $orderTable['status'] = 'waiting';

        $rawOrder = Order::create($orderTable);


        foreach ($order['orderItems'] as $key => $value) {
            $value['order_id'] = $rawOrder['id'];
            OrderItem::create($value);
        }

        return Order::with('orderItem')
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
        $orderEntity->setUserId($db['userId']);
        $orderEntity->setCustomerAdressId($db['customerAddressId']);
        $orderEntity->setRestaurantId($db['restaurantId']);
        $orderEntity->setStatus($db['status']);

        return $orderEntity;
    }

    public function mapExternal($post)
    {
        $orderEntity = new OrderEntity();
        $orderEntity->setId($post['id']);
        $orderEntity->setUserId($post['userId']);
        $orderEntity->setCustomerAdressId($post['customerAddressId']);
        $orderEntity->setRestaurantId($post['restaurantId']);
        $orderEntity->setStatus($post['status']);

        return $orderEntity;
    }
}