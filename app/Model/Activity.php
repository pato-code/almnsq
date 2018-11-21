<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $fillable=["name" , "day" , "mosque_id" , "type_id" , "imam_id" , "period_id" , "status_id" , "request_name"];
    public function mosque(){
        return $this->belongsTo('App\Model\Mosque' , 'mosque_id');
    }
    public function imam(){
        return $this->belongsTo('App\Model\User' , 'imam_id');
    }
    public function city(){

        return $this->mosque->neighborhood->city();
    }
    public function nieghborhood(){
        return $this->mosque->neighborhood();
    }
    public function location(){
        return $this->mosque->location();
    }
    public function period(){
        return $this->belongsTo('App\Model\Period' , 'period_id');
    }
    public function status(){
        return $this->belongsTo('App\Model\ActivityStatus' , 'status_id');
    }
    public function week(){
        return $this->belongsTo('App\Model\Week' , 'week_id');
    }
    public function type(){
        return $this->belongsTo('App\Model\ActivityType' , 'type_id');
    }

}
