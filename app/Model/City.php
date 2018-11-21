<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable=["name"];
    public function neighborhoods(){
        return $this->hasMany('App\Model\Neighborhood');
    }
    public function mosques(){
        return $this->hasManyThrough('App\Model\Mosque','App\Model\Neighborhood');
    }
}
