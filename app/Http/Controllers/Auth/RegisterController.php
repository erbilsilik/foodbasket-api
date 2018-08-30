<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Register\RegisterRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'phone_number' => $data['phoneNumber'],
            'email' => $data['email'],
            'access_type' => 'customer',
            'status' => 'active',
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $credentials = $request->only('firstName', 'lastName', 'phoneNumber', 'email', 'password', 'password_confirmation');
        $rules = [
            'firstName' => 'required | string | max:255',
            'lastName' => 'required | string | max:255',
            'phoneNumber' => 'required | numeric',
            'email' => 'required | string | email | max: 255 | unique:users',
            'password' => 'required | string | min: 6 | confirmed',
        ];
        $validator = Validator::make($credentials, $rules);
        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'error' => $validator->messages()
                ]
            );
        }

        if ($this->create($request->all()) instanceof User) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Thanks for signing up! Please check your email to complete your registration.'
                ]
            );
        }

        return response()->json(
            [
                'success' => false,
                'message' => 'An error occurred'
            ]
        );
    }
}