<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    protected $table = 'order_products';

    public function Product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
    public function Order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }

}
