<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationDistance extends Model
{
    protected $table = 'locations_distances';

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
}
