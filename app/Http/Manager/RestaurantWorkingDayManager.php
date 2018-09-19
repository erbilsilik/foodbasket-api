<?php

namespace App\Http\Manager;

use App\RestaurantWorkingDay;
use App\Http\Entity\RestaurantWorkingDayEntity;

class RestaurantWorkingDayManager implements ManagerInterface
{

    public function addWorkDay($restaurant_id, $data){
        foreach($data['days_hours'] as $hour){
            $retaurantWorkDay['hour'] = explode(':', $hour)[0];
            $retaurantWorkDay['weekDay'] = explode('-', $hour)[1];
            $retaurantWorkDay['type'] = 'delivery';
            $retaurantWorkDay['restaurantId'] = $restaurant_id;

            $managerMapExternal = (array) $this->mapExternal($retaurantWorkDay);

            return RestaurantWorkingDay::create($managerMapExternal);
        }
    }

    public function map($db)
    {
        $restaurantWorkDayEntity = new RestaurantWorkingDayEntity();
//        $restaurantWorkDayEntity->setId($db['id']);
        $restaurantWorkDayEntity->setRestaurantId($db['restaurantId']);
        $restaurantWorkDayEntity->setWeekDay($db['weekDay']);
        $restaurantWorkDayEntity->setHour($db['hour']);
        $restaurantWorkDayEntity->setType($db['type']);

        return $restaurantWorkDayEntity;
    }

    public function mapExternal($post)
    {
        $restaurantWorkDayEntity = new RestaurantWorkingDayEntity();
//        $restaurantWorkDayEntity->setId($post['id']);
        $restaurantWorkDayEntity->setRestaurantId($post['restaurantId']);
        $restaurantWorkDayEntity->setWeekDay($post['weekDay']);
        $restaurantWorkDayEntity->setHour($post['hour']);
        $restaurantWorkDayEntity->setType($post['type']);

        return $restaurantWorkDayEntity;
    }
}