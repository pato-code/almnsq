<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Imam extends Model
{
    //
    protected $fillable=["user_id","mosque_id"];
    public function user(){
        return $this->belongsTo('App\Model\User','user_id');
    }
    public function mosque(){
        return $this->belongsTo('App\Model\Mosque','mosque_id');
    }
}
