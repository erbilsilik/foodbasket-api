<?php

namespace App\Http\Entity;

class OrderEntity
{
    private $id;
    private $userId;
    private $customerAddressId;
    private $restaurantId;
    private $status;
    private $createdAt;
    private $orderItems = [];

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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getCustomerAddressId()
    {
        return $this->customerAddressId;
    }

    /**
     * @param mixed $customerAddressId
     */
    public function setCustomerAddressId($customerAddressId)
    {
        $this->customerAddressId = $customerAddressId;
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
    public function setRestaurantId($restaurantId)
    {
        $this->restaurantId = $restaurantId;
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
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return array
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * @param array $orderItems
     */
    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;
    }
}