<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mosque extends Model
{
    //
    protected $fillable=["name" , "neighborhood_id" , "imam_id" , "location_id" , "lat" , "lng"];
    public function neighborhood(){
        return $this->belongsTo('App\Model\Neighborhood','neighborhood_id');
    }
    public function imam(){
        return $this->belongsTo('App\Model\User','imam_id');
    }
    public function location(){
        return $this->belongsTo('App\Location' , 'location_id');
    }
}
