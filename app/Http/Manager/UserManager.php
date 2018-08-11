<?php

namespace App\Http\Manager;

class UserManager
{
    // access types
    const ACCESS_TYPE_CUSTOMER = 'customer';
    const ACCESS_TYPE_RESTAURANT_OWNER = 'restaurant_owner';
    const ACCESS_TYPE_OWNER = 'owner';

    // statuses
    const STATUS_ACTIVE = 'active';
    const STATUS_DISABLED = 'disabled';
    const STATUS_DELETED = 'deleted';
}