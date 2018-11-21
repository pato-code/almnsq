<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable=["title","text","photo","type_id"];
    public function type(){
        return $this->belongsTo('App\Model\NewsType' , 'type_id');
    }
}
