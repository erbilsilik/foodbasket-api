<?php

namespace App\Http\Manager;

use App\Food;
use App\Restaurant;

class FoodManager
{
    // methods for CUSTOMERS

    public function getFoodList($restaurantId)
    {
        if (isset($restaurantId)) {
            return Food::where('restaurant_id', $restaurantId)
                ->get();
        }

        return 'No restaurantId provided';
    }

    // methods for RESTAURANT OWNERS

    public function addFood($data, $restaurantId)
    {
        return Food::with('restaurants')
            ->where('restaurant_id', $restaurantId)
            ->create($data);
    }

    public function updateFood($id, $data)
    {
        $food = Food::findOrFail($id);
        $food->update($data);

        return $food;
    }

    public function deleteFood($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
    }
}