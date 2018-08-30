<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantWorkingDay extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id', 'week_day', 'hour', 'type'
    ];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
}
