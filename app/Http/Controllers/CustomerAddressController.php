<?php

namespace App\Http\Controllers;

use App\Http\Manager\CustomerAddressManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerAddressController extends Controller
{
    private $customerAddressManager;

    public function __construct()
    {
        $this->customerAddressManager = New CustomerAddressManager();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json($this->customerAddressManager->getCustomerAddresses());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = $this->customerAddressManager->mapExternal($request->all());
        $newAddress = $this->customerAddressManager->addAddress($address);

        return response()->json($newAddress, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->customerAddressManager->getAddress($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()
            ->json($this->customerAddressManager->updateAddress($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->customerAddressManager->deleteAddress($id);

        return response(204);
    }
}
