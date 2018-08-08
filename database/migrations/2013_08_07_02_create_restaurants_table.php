<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location_postcode');
            $table->float('longitude');
            $table->float('latitude');
            $table->text('description')->nullable();
            $table->string('restaurant_owner_name');
            $table->string('restaurant_email');
            // $table->enum('status', [
            //     'active',
            //     'deactive',
            // ]);
            $table->string('web_site')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
