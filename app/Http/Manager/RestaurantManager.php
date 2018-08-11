<?php

namespace App\Http\Manager;

use App\Helper;
use App\Http\Entity\RestaurantEntity;
use App\LocationPostCode;
use App\Restaurant;
use App\LocationDistance;
use DB;

class RestaurantManager
{
    // methods for OWNERS
    public function getRestaurantList()
    {
        return Restaurant::all();
    }

    public function getRestaurantById($id)
    {
        return Restaurant::find($id);
    }

    public function addRestaurant($data)
    {
        return Restaurant::create($data);
    }

    public function updateRestaurant($id, $data)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($data);

        return $restaurant;
    }

    public function deleteRestaurant($id)
    {
        $article = Restaurant::findOrFail($id);
        $article->delete();
    }

    public function searchRestaurantsByPostCode($postCode)
    {
        // Get PostCode Info from api
        $locationInfo = Helper::getLocationInfo($postCode);

        if ($locationInfo) {
            //Seacrh PostCode Info
            $postcodeLongitude = $locationInfo->result->longitude;
            $postcodeLatitude = $locationInfo->result->latitude;
            $postcodeIncode = $locationInfo->result->incode;
            $postcodeOutcode = $locationInfo->result->outcode;
            // Search Border Number
            $postCodeBorderNumber = substr($postcodeIncode, 0, 1);

            //Search 1. Step
            //Postcode Search
            $locationPostcodes = LocationPostCode::where([
                ['area', $postcodeOutcode],
                ['postcode_border', $postCodeBorderNumber],
            ])
            ->orwhere([
                ['area', $postcodeOutcode],
                ['postcode_border', 10],
            ])
            ->get();

            $restaurants = [];
            $i = 0;
            $rest = [];

            foreach($locationPostcodes as $locationPostCode){
                $restaurants[$i]['restaurant'] = Restaurant::find($locationPostCode->restaurant_id);
                $location = LocationPostCode::find($locationPostCode->id);
                $restaurants[$i]['min_price'] = $location->min_price;
                $restaurants[$i]['rise_price'] = $location->rise_price;
                $restaurants[$i]['normal_price'] = $location->normal_price;
                $i++;
            }

            //Search 2. Step
            //Distance Search
            $distances = DB::select('SELECT restaurants.*, SQRT(POW((restaurants.longitude - ('.$postcodeLongitude.')), 2) + POW((restaurants.latitude - ('.$postcodeLatitude.')), 2)) as mesafe FROM restaurants');

            foreach($distances as $distance) {
                $realDistances = LocationDistance::where([
                ['start_mil', '<=', $distance->mesafe],
                ['end_mil', '>=', $distance->mesafe],
                ])->get();

                foreach($realDistances as $realDistance){
                    if(!in_array($realDistance->restaurant_id, $rest)){
                        array_push($rest, $realDistance->restaurant_id);
                        $restaurants[$i]['restaurant'] = Restaurant::find($realDistance->restaurant_id);
                        $location = LocationDistance::find($realDistance->id);
                        $restaurants[$i]['min_price'] = $location->min_price;
                        $restaurants[$i]['rise_price'] = $location->rise_price;
                        $restaurants[$i]['normal_price'] = $location->normal_price;
                        $i++;
                    }
                }

            }

            return $restaurants;
        }

        return 'No location info found!';

    }
}


/*    public function map($db)
    {
        $restaurantEntity = new RestaurantEntity();
        $restaurantEntity->setId($db->id);
        $restaurantEntity->setName($db->name);
        $restaurantEntity->setDescription($db->description);
        $restaurantEntity->setEmail($db->email);
        $restaurantEntity->setWebPage($db->web_page);
        $restaurantEntity->setType($db->type);

        return $restaurantEntity;
    }

    public function mapExternal($post)
    {
        $restaurantEntity = new RestaurantEntity();
        $restaurantEntity->setId($post->id);
        $restaurantEntity->setName(trim($post->name));
        $restaurantEntity->setDescription(trim($post->description));
        $restaurantEntity->setEmail(trim($post->email));
        $restaurantEntity->setWebPage(trim($post->webPage));
        $restaurantEntity->setType($post->type);

        return $restaurantEntity;
    }
*/