<?php

namespace App\Http\Controllers\Api;

use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Manager\RestaurantManager;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    private $restaurantManager;

    /**
     * RestaurantController constructor.
     */
    public function __construct()
    {
        $this->restaurantManager = new RestaurantManager();
    }

    // GENERAL ENDPOINTS //

    public function searchRestaurants(Request $request)
    {
        $postCode = $request->get('postcode');
        return response()
            ->json($this->restaurantManager->searchRestaurantsByPostCode($postCode));
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
            ->json($this->restaurantManager->getRestaurantList());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->restaurantManager->addRestaurant($request->all());
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
            ->json($this->restaurantManager->getRestaurantById($id));
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
            ->json($this->restaurantManager->updateRestaurant($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->restaurantManager->deleteRestaurant($id);

        return response(204);
    }
}
