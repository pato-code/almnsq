<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    //
    protected $fillable=["title","file" , "photo" , "mosque_id"];
    public function mosque(){
        return $this->belongsTo('App\Model\Mosque' , 'mosque_id');
    }
}
