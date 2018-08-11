<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Manager\RestaurantManager;

class RestaurantController extends Controller
{
    // GENERAL ENDPOINTS //

    public function searchRestaurants(Request $request)
    {
        $postCode = $request->get('postcode');
        RestaurantManager::searchRestaurantsByPostCode($postCode);
    }

    // ENDPOINTS FOR OWNERS //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json(RestaurantManager::getRestaurantList());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return RestaurantManager::addRestaurant($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()
            ->json(RestaurantManager::getRestaurantById($id));
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
            ->json(RestaurantManager::updateRestaurant($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RestaurantManager::deleteRestaurant($id);

        return response(204);
    }
}
