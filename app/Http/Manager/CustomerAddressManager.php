<?php

namespace App\Http\Manager;

use App\CustomerAddress;
use App\Helper;
use App\Http\Entity\CustomerAddressEntity;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Tymon\JWTAuth\Claims\Custom;

class CustomerAddressManager implements ManagerInterface
{
    /**
     * @return array
     */
    public function getCustomerAddresses()
    {
        $addresses = CustomerAddress::where('user_id', Auth::user()->getAuthIdentifier())
            ->get();

        $addressList = [];
        foreach ($addresses as $address) {
            $address = self::map($address);
            $addressList[] = [
                'id' => $address->getId(),
                'userId' => $address->getUserId(),
                'postcode' => $address->getPostcode(),
                'address' => $address->getAddress()
            ];
        }

        return $addressList;
    }

    /**
     * @param CustomerAddressEntity $address
     * @return mixed
     */
    public function addAddress(CustomerAddressEntity $address)
    {
        CustomerAddress::create([
            'user_id' => Auth::user()->getAuthIdentifier(),
            'postcode' => $address->getPostcode(),
            'address' => $address->getAddress(),
        ]);

        return CustomerAddress::where('user_id', Auth::user()->getAuthIdentifier())
            ->get();
    }

    /**
     * @param $id
     * @return CustomerAddressEntity
     */
    public function getAddress($id) {
        $address = CustomerAddress::find($id);
        $address = self::map($address);

        return $address;
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updateAddress($id, $data)
    {
        $address = CustomerAddress::findOrFail($id);
        $updatedAddress = self::map($data);
        $address->update($updatedAddress);

        return $address;
    }

    /**
     * @param $id
     */
    public function deleteAddress($id)
    {
        $address = CustomerAddress::findOrFail($id);
        $address->delete();
    }

    /**
     * @param $db
     * @return CustomerAddressEntity
     */
    public function map($db)
    {
        $customerAddressEntity = new CustomerAddressEntity();
        $customerAddressEntity->setId($db->id);
        $customerAddressEntity->setUserId($db->user_id);
        $customerAddressEntity->setPostcode($db->postcode);
        $customerAddressEntity->setAddress($db->address);

        return $customerAddressEntity;
    }

    /**
     * @param $post
     * @return CustomerAddressEntity
     */
    public function mapExternal($post)
    {
        $customerAddressEntity = new CustomerAddressEntity();
        if (isset($post['customerId'])) {
            $customerAddressEntity->setUserId($post['customerId']);
        }
        if (empty($post['customerId'])) {
            throw new Exception('Customer id not found');
        }
        if (isset($post['postcode'])) {
            $customerAddressEntity->setPostcode($post['postcode']);
        }
        if (empty($post['postcode'])) {
            throw new Exception('Postcode not found');
        }
        if (isset($post['address'])) {
            $customerAddressEntity->setAddress($post['address']);
        }
        if (empty($post['address'])) {
            throw new Exception('Address not found');
        }

        return $customerAddressEntity;
    }

}