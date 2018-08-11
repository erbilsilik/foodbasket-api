<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $table = 'customer_addresses';
    public $city;

    public function customer()
    {
        return $this->belongsTo('\App\User');
    }

    public function orders()
    {
        return $this->hasMany('\App\Order');
    }
}
