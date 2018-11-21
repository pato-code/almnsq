<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable=["name"];
    public function mosques(){
        return $this->hasMany('App\Model\Mosque');
    }
}
