<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $orderItems = $this->request->get('orderItems');

        $rules['customerAddressId'] = 'required|integer';
        $rules['restaurantId'] = 'required|integer';
        $rules['customerAddressId'] = 'required|string';
        $rules['customerAddressId'] = 'required|string';
        $rules['$orderItems'] = 'required|array';

        foreach ($orderItems as $key => $orderItem) {
            $rules['orderItems.' . $key . '.food_id'] = 'required|integer';
            $rules['oderItems.'. $key . '.restaurant_id'] = 'required|integer';
            $rules['$orderItems.' . $key . '.amount'] = 'required|string';
            $rules['$orderItems.'. $key .'.price'] = 'required|string';
        }

        return $rules;
    }
}
