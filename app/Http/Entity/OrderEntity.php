<?php

namespace App\Http\Entity;

class OrderEntity
{
    public $id;
    public $userid;
    public $customer_adress_id;
    public $restaurant_id;
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
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid): void
    {
        $this->userid = $userid;
    }

    /**
     * @return mixed
     */
    public function getCustomerAdressId()
    {
        return $this->customer_adress_id;
    }

    /**
     * @param mixed $customer_adress_id
     */
    public function setCustomerAdressId($customer_adress_id): void
    {
        $this->customer_adress_id = $customer_adress_id;
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