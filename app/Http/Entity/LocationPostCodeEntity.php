<?php

namespace App\Http\Entity;

class LocationPostCodeEntity
{
    public $id;
    public $restaurant_id;
    public $area;
    public $postcode_border;
    public $min_price;
    public $max_price;
    public $normal_price;

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
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     */
    public function setArea($area): void
    {
        $this->area = $area;
    }

    /**
     * @return mixed
     */
    public function getPostcodeBorder()
    {
        return $this->postcode_border;
    }

    /**
     * @param mixed $postcode_border
     */
    public function setPostcodeBorder($postcode_border): void
    {
        $this->postcode_border = $postcode_border;
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
    public function getMaxPrice()
    {
        return $this->max_price;
    }

    /**
     * @param mixed $max_price
     */
    public function setMaxPrice($max_price): void
    {
        $this->max_price = $max_price;
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
}