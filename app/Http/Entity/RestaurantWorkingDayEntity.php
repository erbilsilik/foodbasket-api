<?php

namespace App\Http\Entity;

class RestaurantWorkingDayEntity
{
    public $id;
    public $restaurant_id;
    public $week_day;
    public $start_hours;
    public $end_hours;
    public $status;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRestaurantId()
    {
        return $this->restaurant_id;
    }

    /**
     * @param mixed $restaurant_id
     */
    public function setRestaurantId($restaurant_id): void
    {
        $this->restaurant_id = $restaurant_id;
    }

    /**
     * @return mixed
     */
    public function getWeekDay()
    {
        return $this->week_day;
    }

    /**
     * @param mixed $week_day
     */
    public function setWeekDay($week_day): void
    {
        $this->week_day = $week_day;
    }

    /**
     * @return mixed
     */
    public function getStartHours()
    {
        return $this->start_hours;
    }

    /**
     * @param mixed $start_hours
     */
    public function setStartHours($start_hours): void
    {
        $this->start_hours = $start_hours;
    }

    /**
     * @return mixed
     */
    public function getEndHours()
    {
        return $this->end_hours;
    }

    /**
     * @param mixed $end_hours
     */
    public function setEndHours($end_hours): void
    {
        $this->end_hours = $end_hours;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }
}