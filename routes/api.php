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

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'check.owner'], (function () {
    Route::get('restaurants', 'RestaurantController@index');
    Route::get('restaurants/{id}', 'RestaurantController@show');
    Route::post('restaurants', 'RestaurantController@store');
    Route::put('restaurants/{id}', 'RestaurantController@update');
    Route::delete('restaurants/{id}', 'RestaurantController@destroy');
}));

Route::get('{restaurantId}/foods', 'FoodController@index');
Route::post('{restaurantId}/foods', 'FoodController@store');
Route::put('foods/{id}', 'FoodController@update');
Route::delete('foods/{id}', 'FoodController@destroy');

Route::get('restaurant-search', 'RestaurantController@searchRestaurants');

Route::get('{userId}/orders', 'OrderController@index');
Route::post('{userId}/orders', 'OrderController@store');
Route::put('orders/{id}', 'OrderController@update');
Route::delete('orders/{id}', 'OrderController@destroy');
