<?php

namespace App\Http\Entity;

class LocationDistanceEntity
{
    public $id;
    public $restaurant_id;
    public $start_mil;
    public $end_mil;
    public $min_price;
    public $normal_price;
    public $rise_price;

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
    public function getStartMil()
    {
        return $this->start_mil;
    }

    /**
     * @param mixed $start_mil
     */
    public function setStartMil($start_mil): void
    {
        $this->start_mil = $start_mil;
    }

    /**
     * @return mixed
     */
    public function getEndMil()
    {
        return $this->end_mil;
    }

    /**
     * @param mixed $end_mil
     */
    public function setEndMil($end_mil): void
    {
        $this->end_mil = $end_mil;
    }

    /**
     * @return mixed
     */
    public function getMinPrice()
    {
        return $this->min_price;
    }

    /**
     * @param mixed $min_price
     */
    public function setMinPrice($min_price): void
    {
        $this->min_price = $min_price;
    }

    /**
     * @return mixed
     */
    public function getNormalPrice()
    {
        return $this->normal_price;
    }

    /**
     * @param mixed $normal_price
     */
    public function setNormalPrice($normal_price): void
    {
        $this->normal_price = $normal_price;
    }

    /**
     * @return mixed
     */
    public function getRisePrice()
    {
        return $this->rise_price;
    }

    /**
     * @param mixed $rise_price
     */
    public function setRisePrice($rise_price): void
    {
        $this->rise_price = $rise_price;
    }

}