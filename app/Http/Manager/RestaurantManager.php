<?php

namespace App\Http\Manager;

use App\Helper;
use App\LocationPostCode;
use App\Restaurant;

class RestaurantManager
{
    // methods for OWNERS
    public static function getRestaurantList()
    {
        return Restaurant::all();
    }

    public static function getRestaurantById($id)
    {
        return Restaurant::find($id);
    }

    public static function addRestaurant($data)
    {
        return Restaurant::create($data);
    }

    public static function updateRestaurant($id, $data)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($data);

        return $restaurant;
    }

    public static function deleteRestaurant($id)
    {
        $article = Restaurant::findOrFail($id);
        $article->delete();
    }

    public static function searchRestaurantsByPostCode($postCode)
    {
        $locationInfo = Helper::getLocationInfo($postCode);

        if ($locationInfo) {
            $postcodeLongitude = $locationInfo->result->longitude;
            $postcodeLatitude = $locationInfo->result->latitude;
            $postcodeIncode = $locationInfo->result->incode;
            $postcodeOutcode = $locationInfo->result->outcode;
            $postIncodeNumber = substr($postcodeIncode, 0, 1);
            $i = 0;
            $restaurants = [];
            $rest = [];

            $locationPostcodes = LocationPostCode::where([
                ['postcode', $postcodeOutcode],
                ['postcode_border', $postcodeIncode],
            ])
                ->orwhere([
                    ['postcode',$postcodeOutcode],
                    ['postcode_border', 10],
                ])
                ->get();

            foreach ($locationPostcodes as $LocationPostcode) {
                if (!in_array($LocationPostcode->restaurant_id, $rest)) {
                    array_push($rest, $LocationPostcode->restaurant_id);
                    $restaurants[$i]['restaurant'] = Restaurant::find($locationPostcode->restaurant_id);
                    $location = LocationPostCode::find($locationPostcode->id);
                    $restaurants[$i]['min_price'] = $location->min_price;
                    $restaurants[$i]['rise_price'] = $location->rise_price;
                    $restaurants[$i]['normal_price'] = $location->normal_price;
                    $i++;
                }
            }

            $distances = DB::select('SELECT restaurants.*, SQRT(POW((restaurants.longitude - ('.$postcodeLongitude.')), 2) +                    POW((restaurants.latitude - ('.$postcodeLatitude.')), 2)) as mesafe FROM `restaurants` HAVING mesafe < 100');
        }

        return 'No location info found!';
    }
}