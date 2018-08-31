<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public $user_id;
    public $customer_address_id;
    public $restaurant_id;
    public $status;

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

    public function orderItems()
    {
        return $this->hasMany('\App\OrderItem');
    }
}
