<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsDistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations_distances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('restaurant_id')->unsigned()->index();
            $table->string('start_mil');
            $table->string('end_mil');
            $table->float('min_price');
            $table->float('max_price');
            $table->float('rise_price');
            $table->float('normal_price');
            $table->timestamps();
        });

        Schema::table('locations_distances', function (Blueprint $table) {
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations_distances');
    }
}
