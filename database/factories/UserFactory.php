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
        'email' => $faker->companyEmail,
        'postcode' => "LS9 3DC",
        'longitude' => "13131313",
        'latitude' => "133113313131",

        'user_id' => function() {
            return factory(\App\User::class)->create()->id;
        },
    ];
});

$factory->define(\App\LocationPostCode::class, function (Faker $faker) {
    return [
        'area' => $faker->city,
        'postcode_border' => $faker->postcode,
        'restaurant_id' => function() {
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
        'start_mil' => 1,
        'end_mil' => 10,
        'restaurant_id' => function() {
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
        'restaurant_id' => function() {
            return factory(\App\Restaurant::class)->create()->id;
        },
        'start_hour' => 1,
        'end_hour' => 10,
        'week_day' => $faker->randomElement(['monday', 'sunday', 'tuesday', 'wednesday', 'friday', 'saturday', 'sunday']),
        'status' => $faker->randomElement(['open', 'closed']),
    ];
});

$factory->define(\App\Food::class, function (Faker $faker) {
    return [
        'restaurant_id' => function() {
            return factory(\App\Restaurant::class)->create()->id;
        },
        'name' => $faker->colorName,
        'detail' => $faker->text(200),
        'img' => $faker->imageUrl(),
        'price' => 5
    ];
});