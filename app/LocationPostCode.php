<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationPostCode extends Model
{
    protected $table = 'locations_post_codes';

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
}
