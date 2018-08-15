<?php

namespace App\Http\Manager;

use App\Http\Entity\OrderEntity;
use App\Order;
use App\Restaurant;

class OrderManager implements ManagerInterface
{
    // methods for Order List

    public function getOrderList($userId)
    {
        if (isset($userId)) {
            return Order::where('user_id', $userId)
                ->get();
        }

        return 'No userId provided';
    }

    // methods for Order Add

    public function addOrder($data, $userId)
    {
        $managerMapExternal = (array) $this->mapExternal($data);

        return Order::with('users')
            ->where('user_id', $userId)
            ->create($managerMapExternal);
    }

    public function updateOrder($id, $data)
    {
        $order = Order::findOrFail($id);
        $managerMap = (array) $this->map($data);
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