<?php

namespace App\Http\Manager;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Entity\UserEntity;

class UserManager implements ManagerInterface
{
    // access types
    const ACCESS_TYPE_CUSTOMER = 'customer';
    const ACCESS_TYPE_RESTAURANT_OWNER = 'restaurant_owner';
    const ACCESS_TYPE_OWNER = 'owner';

    // statuses
    const ACTIVE_STATUS = 'active';
    const DISABLED_STATUS = 'disabled';
    const DELETED_STATUS = 'deleted';

    public function addUser($data)
    {
        $managerMapExternal = (array) $this->mapExternal($data);
//        return $managerMapExternal;
        return User::create($managerMapExternal);
    }

    public function map($db)
    {
        $userEntity = new UserEntity();
        $userEntity->setId($db['id']);
        $userEntity->setFirstName($db['first_name']);
        $userEntity->setLastName($db['last_name']);
        $userEntity->setEmail($db['email']);
        $userEntity->setPhoneNumber($db['phone_number']);
        $userEntity->setAccessType($db['accessType']);
        $userEntity->setStatus($db['status']);

        return $userEntity;
    }

    public function mapExternal($post)
    {
        $userEntity = new UserEntity();
        $userEntity->setId($post['id']);
        $userEntity->setFirstName($post['firstName']);
        $userEntity->setLastName($post['lastName']);
        $userEntity->setEmail($post['email']);
        $userEntity->setPhoneNumber($post['phoneNumber']);
        $userEntity->setPassword(Hash::make($post['password']));
        $userEntity->setAccessType($post['accessType']);
        $userEntity->setStatus($post['status']);

        return $userEntity;
    }
}