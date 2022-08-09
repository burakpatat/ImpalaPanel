<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstateCategory extends Model
{
    use HasFactory;

    public function estateCount(){
        return $this->hasMany('App\Models\Estate','estatecategory_id','id')->where('status',1)->count();
    }
}
