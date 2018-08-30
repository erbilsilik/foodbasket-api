<?php

namespace App\Http\Manager;

use App\Order;
use App\OrderItem;
use App\Restaurant;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

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