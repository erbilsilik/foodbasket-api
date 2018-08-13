<?php

namespace App\Http\Entity;

class RestaurantWorkingDayEntity
{
    public $id;
    public $restaurantId;
    public $weekDay;
    public $startHours;
    public $endHours;
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
        return $this->restaurantId;
    }

    /**
     * @param mixed $restaurantId
     */
    public function setRestaurantId($restaurantId): void
    {
        $this->restaurantId = $restaurantId;
    }

    /**
     * @return mixed
     */
    public function getWeekDay()
    {
        return $this->weekDay;
    }

    /**
     * @param mixed $weekDay
     */
    public function setWeekDay($weekDay): void
    {
        $this->weekDay = $weekDay;
    }

    /**
     * @return mixed
     */
    public function getStartHours()
    {
        return $this->startHours;
    }

    /**
     * @param mixed $startHours
     */
    public function setStartHours($startHours): void
    {
        $this->startHours = $startHours;
    }

    /**
     * @return mixed
     */
    public function getEndHours()
    {
        return $this->endHours;
    }

    /**
     * @param mixed $endHours
     */
    public function setEndHours($endHours): void
    {
        $this->endHours = $endHours;
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