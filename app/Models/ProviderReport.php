<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderReport extends Model
{
    use HasFactory;
    protected $table = 'provider_reports';

    public function ProviderReportProducts()
    {
        return $this->hasMany('App\Models\ProviderReportProduct','report_id','id');
    }

    public function Customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }
    public function Provider()
    {
        return $this->belongsTo('App\Models\Provider', 'provider_id', 'id');
    }
}
