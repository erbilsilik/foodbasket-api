<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'customer_address_id', 'restaurant_id', 'status'
    ];

    public function user()
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
