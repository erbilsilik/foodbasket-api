<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'food_id', 'order_id', 'amount', 'price'
        ];

    public function foods()
    {
        $this->hasMany('\App\Food');
    }

    public function order()
    {
        $this->belongsTo('\App\Order');
    }
}
