<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public function restaurant()
    {
        $this->belongsTo('App\Restaurant');
    }
}
