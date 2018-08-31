<?php

namespace App\Http\Controllers\Api;

use App\Http\Manager\FoodManager;
use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    private $foodManager;

    public function __construct()
    {
        $this->foodManager = New FoodManager();
    }

    /**
     * @param $restaurantId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($restaurantId)
    {
        return response()
            ->json($this->foodManager->getFoodList($restaurantId));
    }

    /**
     * @param Request $request
     * @param $restaurantId
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request, $restaurantId)
    {
//        var_dump($request->all());
//        var_dump($id);
//        die();
        return $this->foodManager->addFood($request->all(), $restaurantId);
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
            ->json($this->foodManager->updateFood($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->foodManager->deleteFood($id);

        return response(204);
    }
}
