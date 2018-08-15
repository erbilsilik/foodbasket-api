<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace' => 'MasterAdmin', 'prefix' => 'admin'], function () {
    Route::get('/login','LoginController@loginIndex');
    Route::post('/login','LoginController@postLogin');
});


Route::group(['namespace' => 'MasterAdmin', 'prefix' => 'admin', 'middleware' => 'check.owner'], function () {
    Route::get('/','HomeController@homeIndex');
    Route::get('/restaurants','RestaurantController@allRestaurantsIndex');
    Route::get('/add-restaurant','RestaurantController@addRestaurantsIndex');
    Route::post('/add-restaurant','RestaurantController@addRestaurantsPost');
});