<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Http\Entity\RestaurantWorkingDayEntity;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;
use App\Http\Manager\RestaurantManager;
use App\Http\Manager\RestaurantWorkingDayManager;
use App\Http\Manager\UserManager;
use App\Http\Controllers\Controller;
use App\Helper;

class RestaurantController extends Controller
{
    private $restaurantManager;
    private $userManager;
    private $restaurantWorkingDayManager;

    /**
     * RestaurantController constructor.
     */
    public function __construct()
    {
        $this->restaurantManager = new RestaurantManager();
        $this->userManager = new UserManager();
        $this->restaurantWorkingDayManager = new RestaurantWorkingDayManager();
    }

    /**
     * @return mixed
     */
    public function allRestaurantsIndex()
    {
        $data['Restaurants'] = Restaurant::all();
        return view('MasterAdmin/Pages/Restaurants', $data);
    }

    /**
     * @return mixed
     */
    public function addRestaurantsIndex()
    {
        return view('MasterAdmin/Pages/AddRestaurant');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function addRestaurantsPost(Request $request)
    {
        $requestData = $request->all();

        $locationInfo = Helper::getLocationInfo($requestData['postcode']);

        if($locationInfo){
//            return var_dump($requestData);
            $requestData['accessType'] = 'restaurant_owner';
            $requestData['status'] = 'active';
            $requestData['longitude'] = $locationInfo->result->longitude;
            $requestData['latitude'] = $locationInfo->result->latitude;
            $requestData['id'] = null;

            $addUser = $this->userManager->addUser($requestData);

            $requestData['userId'] = $addUser->id;
            $addRestaurant = $this->restaurantManager->addRestaurant($requestData);

            $addRestaurantWorkingDay = $this->restaurantWorkingDayManager->addWorkDay($addRestaurant->id, $requestData);

            return Redirect('/admin/restaurants');
        }

        return 'Error';

    }
}
