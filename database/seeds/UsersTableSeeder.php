<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Restaurant;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // User::truncate();

        $faker = \Faker\Factory::create();

        $password = Hash::make('secret');

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'restaurant_id' => rand(1,10)
                // 'restaurant_id' => function() {
                //     return factory(Restaurant::class)->create()->id;
                // }
            ]);
        }
    }
}
