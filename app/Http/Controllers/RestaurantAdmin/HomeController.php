<?php

namespace App\Http\Controllers\RestaurantAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class HomeController extends Controller
{
    public $user;
    public $order;

    public function homeIndex(Request $request) {

        $this->user = User::find($request->session()->get('restaurant_owner')->id);
        $restaurant['Restaurant'] = $this->user->restaurant;

        $this->order = $this->user->restaurant->orders;
        $restaurant['OrderCount'] = $this->user->restaurant->orders->where('status','approved')->count();
        $restaurant['Orders'] = $this->order;

        return view('RestaurantAdmin/Pages/HomePage', $restaurant);
    }
}
