<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $table = 'customer_addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'postcode', 'address'
    ];

    public function customer()
    {
        return $this->belongsTo('\App\User');
    }

    public function orders()
    {
        return $this->hasMany('\App\Order');
    }
}
