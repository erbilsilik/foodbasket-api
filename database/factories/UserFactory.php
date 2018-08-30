<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'access_type' => $faker->randomElement(['customer', 'restaurant_owner', 'owner']),
        'status' => 'active'
    ];
});

$factory->define(\App\Restaurant::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'postcode' => $faker->randomElement(["OX49 5NU", "M32 0JG", "NE30 1DP"]),
        'longitude' => $faker->randomElement(["-1.069752", "-2.302836", "-1.439269"]),
        'latitude' => $faker->randomElement(["51.655929", "53.455654", "55.011303"]),
        'address' => $faker->address,

        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
    ];
});

$factory->define(\App\LocationPostCode::class, function (Faker $faker) {
    return [
        'area' => $faker->randomElement(["OX49", "M32", "NE30"]),
        'postcode_border' => $faker->numberBetween(1, 10),
        'restaurant_id' => function () {
            return factory(\App\Restaurant::class)->create()->id;
        },
        'min_price' => 1.40,
        'max_price' => 4.00,
        'rise_price' => 3.88,
        'normal_price' => 1.55
    ];
});

$factory->define(\App\LocationDistance::class, function (Faker $faker) {
    return [
        'start_mil' => 0,
        'end_mil' => 5,
        'restaurant_id' => function () {
            return factory(\App\Restaurant::class)->create()->id;
        },
        'min_price' => 1.40,
        'max_price' => 4.00,
        'rise_price' => 3.88,
        'normal_price' => 1.55
    ];
});

$factory->define(\App\RestaurantWorkingDay::class, function (Faker $faker) {
    return [
        'restaurant_id' => function () {
            return factory(\App\Restaurant::class)->create()->id;
        },
        'hour' => $faker->randomElement(['1', '2', '3', '4', '5', '6', '7']),
        'week_day' => $faker->randomElement(['1', '2', '3', '4', '5', '6', '7']),
        'type' => $faker->randomElement(['delivery', 'collection']),
    ];
});

$factory->define(\App\Food::class, function (Faker $faker) {
    return [
        'restaurant_id' => function () {
            return factory(\App\Restaurant::class)->create()->id;
        },
        'name' => $faker->colorName,
        'detail' => $faker->text(200),
        'img' => $faker->imageUrl(),
        'price' => 5
    ];
});

$factory->define(\App\CustomerAddress::class, function (Faker $faker) {
    return [
        'postcode' => $faker->randomElement(["OX49 5NU", "M32 0JG", "NE30 1DP"]),
        'address' => $faker->address,
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
    ];
});

$factory->define(\App\OrderItem::class, function (Faker $faker) {
    $foods = \App\Food::pluck('id')->toArray();
    $orders = \App\Order::pluck('id')->toArray();
    return [
        'food_id' => $faker->randomElement($foods),
        'order_id' => $faker->randomElement($orders),
        'price' => $faker->numberBetween(1, 500),
        'amount' => $faker->numberBetween(1, 10)
    ];
});

$factory->define(\App\Order::class, function (Faker $faker) {
    $customers = \App\User::pluck('id')->toArray();
    $restaurants = \App\Restaurant::pluck('id')->toArray();
    $userAddress = \App\CustomerAddress::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($customers),
        'restaurant_id' => $faker->randomElement($restaurants),
        'customer_address_id' => $faker->randomElement($userAddress),
        'status' => $faker->randomElement(['approved', 'waiting', 'rejected']),
    ];
});