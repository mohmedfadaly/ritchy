<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $table = 'sections';

    public function Products()
    {
        return $this->hasMany('App\Product','section_id','id');
    }
    public function Reports()
    {
        return $this->hasMany('App\Models\ReportProduct','section_id','id');
    }

}
