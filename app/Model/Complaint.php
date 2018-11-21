<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    //
    protected $fillable=["name","strengths" , "file" , "notes" , "location_id" , "mosque_id"];

    public function location(){
        return $this->belongsTo('App\Model\Location' , 'location_id');
    }
    public function mosque(){
        return $this->belongsTo('App\Model\Mosque' , 'mosque_id');
    }
}
