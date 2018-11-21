<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SuggestionType extends Model
{
    //
    protected $fillable=["name"];
    public function suggestions(){
        return $this->hasMany('App\Model\Suggestion');
    }
}
