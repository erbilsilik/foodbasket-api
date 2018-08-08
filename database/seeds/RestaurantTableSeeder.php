<?php

use Illuminate\Database\Seeder;
use App\Restaurant;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Restaurant::truncate();
        
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Restaurant::create([
                'name' => $faker->company,
                'location_postcode' => $faker->postcode,
                'longitude' => $faker->longitude,
                'latitude' => $faker->latitude,
                'restaurant_owner_name' => $faker->name,
                'restaurant_email' => $faker->companyEmail,
            ]);
        }
    }
}
