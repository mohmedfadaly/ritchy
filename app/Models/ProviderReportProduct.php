<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderReportProduct extends Model
{
    use HasFactory;
    protected $table = 'report_products';

    public function ProviderReport()
    {
        return $this->belongsTo('App\Models\ProviderReport','report_id','id');
    }
    public function Section()
    {
        return $this->belongsTo('App\Models\Section','section_id','id');
    }
    public function Product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
}
