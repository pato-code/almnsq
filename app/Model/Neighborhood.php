<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    //
    protected $fillable=["name" , "city_id"];
    public function city(){
        return $this->belongsTo("App\Model\City",'city_id');
    }
    public function mosques(){
        return $this->hasMany('App\Model\Mosque');
    }
}
