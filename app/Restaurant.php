<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'description', 'postcode', 'longitude', 'latitude', 'user_id', 'web_page', 'type'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function locationPostCode()
    {
        return $this->hasOne('App\LocationPostCode');
    }

    public function locationDistance()
    {
        return $this->hasOne('App\LocationDistance');
    }

    public function restaurantWorkingDay()
    {
        return $this->hasOne('App\RestaurantWorkingDay');
    }

    public function foods()
    {
        return $this->hasMany('App\Food');
    }
}