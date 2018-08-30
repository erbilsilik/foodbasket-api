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
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'Auth\LoginController@logout');
    Route::post('refresh', 'Auth\LoginController@refresh');
    Route::get('me', 'Auth\LoginController@me');
});
//Search
Route::get('restaurant-search', 'RestaurantController@searchRestaurants');

        //Orders
        Route::get('{userId}/orders', 'OrderController@index');
        Route::post('{userId}/orders', 'OrderController@store');
        Route::delete('orders/{id}', 'OrderController@destroy');
        Route::put('orders/{id}', 'OrderController@update');

    }));

    //Orders
    Route::get('{userId}/orders', 'OrderController@index');
    Route::post('orders', 'OrderController@store');
    Route::delete('orders/{id}', 'OrderController@destroy');
    Route::put('orders/{id}', 'OrderController@update');

        //Orders
        Route::get('{userId}/orders', 'OrderController@index');
        Route::post('{userId}/orders', 'OrderController@store');
    }));

}));
