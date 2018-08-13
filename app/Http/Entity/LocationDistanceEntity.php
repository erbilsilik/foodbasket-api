<?php

namespace App\Http\Entity;

class LocationDistanceEntity
{
    public $id;
    public $restaurantId;
    public $startMil;
    public $endMil;
    public $minPrice;
    public $normalPrice;
    public $risePrice;

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
    public function getStartMil()
    {
        return $this->startMil;
    }

    /**
     * @param mixed $startMil
     */
    public function setStartMil($startMil): void
    {
        $this->startMil = $startMil;
    }

    /**
     * @return mixed
     */
    public function getEndMil()
    {
        return $this->endMil;
    }

    /**
     * @param mixed $endMil
     */
    public function setEndMil($endMil): void
    {
        $this->endMil = $endMil;
    }

    /**
     * @return mixed
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * @param mixed $minPrice
     */
    public function setMinPrice($minPrice): void
    {
        $this->minPrice = $minPrice;
    }

    /**
     * @return mixed
     */
    public function getNormalPrice()
    {
        return $this->normalPrice;
    }

    /**
     * @param mixed $normalPrice
     */
    public function setNormalPrice($normalPrice): void
    {
        $this->normalPrice = $normalPrice;
    }

    /**
     * @return mixed
     */
    public function getRisePrice()
    {
        return $this->risePrice;
    }

    /**
     * @param mixed $risePrice
     */
    public function setRisePrice($risePrice): void
    {
        $this->risePrice = $risePrice;
    }


}