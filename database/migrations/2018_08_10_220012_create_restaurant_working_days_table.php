<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantWorkingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_working_days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('restaurant_id')->unsigned()->index();
            $table->string('week_day');
            $table->float('start_hour');
            $table->float('end_hour');
            $table->enum('status', [
                'open',
                'closed',
            ]);
            $table->timestamps();
        });

        Schema::table('restaurant_working_days', function (Blueprint $table) {
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
        Schema::dropIfExists('restaurant_working_days');
    }
}
