<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id', 'name', 'detail', 'img', 'price'
    ];

    public function restaurant()
    {
        $this->belongsTo('App\Restaurant');
    }
}
