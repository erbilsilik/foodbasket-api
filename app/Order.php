<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public function customer()
    {
        return $this->belongsTo('\App\User');
    }

    public function customerAddress()
    {
        return $this->belongsTo('\App\CustomerAddress');
    }

    public function orderItem()
    {
        return $this->belongsTo('\App\OrderItem');
    }
}
