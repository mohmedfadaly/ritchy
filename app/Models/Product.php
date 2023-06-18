<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Pro_Like;
use URL;
use Auth;
class Product extends Model
{
    use HasFactory;
    protected $table = 'products';


    public function Orders()
    {
        return $this->hasMany('App\Models\Order','product_id','id');
    }

    public function Section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id', 'id');
    }
    public function ProviderReportProducts()
    {
        return $this->hasMany('App\Models\ProviderReportProduct','product_id','id');
    }
}
