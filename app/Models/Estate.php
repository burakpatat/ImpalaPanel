<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estate extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getEstateCategory()
    {
        return $this->hasOne('App\Models\EstateCategory','id','estatecategory_id');
    }
    public function getEstateInfo()
    {
        return $this->hasOne('App\Models\EstateInfo','id','id');
    }
    public function getEstateFeature()
    {
        return $this->hasOne('App\Models\EstateFeature','id','estatecategory_id');
    }
}
