<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    public function foods()
    {
        $this->hasMany('\App\Food');
    }
    public function orders()
    {
        $this->hasMany('\App\Order');
    }
}
