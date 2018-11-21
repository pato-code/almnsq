<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    //
    protected $fillable=["name","body","type_id"];
    public function type(){
        return $this->belongsTo(SuggestionType::class , 'type_id');
    }

}
