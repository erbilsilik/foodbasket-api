<?php

namespace App\Http\Manager;

use App\Order;
use App\Restaurant;

class OrderManager
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
        return Food::with('users')
            ->where('user_id', $userId)
            ->create($data);
    }

    public function updateOrder($id, $data)
    {
        $order = Order::findOrFail($id);
        $order->update($data);

        return $order;
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
    }
}