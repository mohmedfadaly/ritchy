<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function OrderProducts()
    {
        return $this->hasMany('App\Models\Order_Product','order_id','id');
    }

    public function Customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }

    public function Country()
    {
        return $this->belongsTo('App\Models\Country','country_id','id');
    }

    public function City()
    {
        return $this->belongsTo('App\Models\City','city_id','id');
    }

}
