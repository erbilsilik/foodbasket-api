<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['namespace' => 'Api'], (function () {

    Route::post('register', 'Auth\RegisterController@register');
    Route::post('login', 'Auth\LoginController@login');
    Route::group(['middleware' => ['jwt.auth', 'check.customer']], function() {
        Route::get('logout', 'Auth\LoginController@logout');
        Route::post('refresh', 'Auth\LoginController@refresh');
        Route::get('me', 'Auth\LoginController@me');
    });
    //Search
    Route::get('restaurant-search', 'RestaurantController@searchRestaurants');

    Route::group(['middleware' => 'check.owner'], (function () {
        //Restaurants
        Route::get('restaurants', 'RestaurantController@index');
        Route::get('restaurants/{id}', 'RestaurantController@show');
        Route::post('restaurants', 'RestaurantController@store');
        Route::put('restaurants/{id}', 'RestaurantController@update');
        Route::delete('restaurants/{id}', 'RestaurantController@destroy');
    }));

    Route::group(['middleware' => 'check.restaurant.owner'], (function () {
        //Foods
        Route::get('{restaurantId}/foods', 'FoodController@index');
        Route::post('{restaurantId}/foods', 'FoodController@store');
        Route::put('foods/{id}', 'FoodController@update');
        Route::delete('foods/{id}', 'FoodController@destroy');

        //Orders
        Route::get('orders', 'OrderController@index');
        Route::post('orders', 'OrderController@store');
        Route::delete('orders/{id}', 'OrderController@destroy');
        Route::put('orders/{id}', 'OrderController@update');

    }));

    Route::group(['middleware' => 'check.customer'], (function () {
        //Foods
        Route::get('{restaurantId}/foods', 'FoodController@index');

        //Orders
        Route::get('{userId}/orders', 'OrderController@index');
        Route::post('{userId}/orders', 'OrderController@store');
    }));

}));

Route::get('redis', 'SocketController@redis');