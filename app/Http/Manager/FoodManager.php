<?php

namespace App\Http\Manager;

use App\Food;
use App\Restaurant;
use App\Http\Entity\FoodEntity;

class FoodManager implements ManagerInterface
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
        $food = $this->mapExternal($data);

        return Food::with('restaurants')
            ->where('restaurant_id', $restaurantId)
            ->create($food);
    }

    public function updateFood($id, $data)
    {
        $food = Food::findOrFail($id);
        $managerMap = $this->map($data);
        $food->update($managerMap);

        return $food;
    }

    public function deleteFood($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
    }

    public function map($db)
    {
        $foodEntity = new FoodEntity();
        $foodEntity->setId($db->id);
        $foodEntity->setRestaurantId($db->restaurant_id);
        $foodEntity->setName($db->name);
        $foodEntity->setDetail($db->detail);
        $foodEntity->setImg($db->img);
        $foodEntity->setPrice($db->price);

        return $foodEntity;
    }

    public function mapExternal($post)
    {
        $foodEntity = new FoodEntity();
        $foodEntity->setId($post->id);
        $foodEntity->setRestaurantId($post->restaurant_id);
        $foodEntity->setName($post->name);
        $foodEntity->setDetail($post->detail);
        $foodEntity->setImg($post->img);
        $foodEntity->setPrice($post->price);

        return $foodEntity;
    }
}