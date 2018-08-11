<?php

namespace App\Http\Manager;

use App\Helper;
use App\Http\Entity\RestaurantEntity;
use App\LocationPostCode;
use App\Restaurant;

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