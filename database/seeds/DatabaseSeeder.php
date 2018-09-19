<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 5)->create();
        factory(\App\Restaurant::class, 1)->create();
        factory(\App\LocationPostCode::class, 3)->create();
        factory(\App\LocationDistance::class, 3)->create();
        factory(\App\RestaurantWorkingDay::class, 3)->create();
        factory(\App\Food::class, 4)->create();
        factory(\App\CustomerAddress::class, 4)->create();
        factory(\App\Order::class, 4)->create();
        factory(\App\OrderItem::class, 4)->create();

    }
}
