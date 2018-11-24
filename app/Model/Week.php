<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    //
    protected $fillable=["start_date" , "end_date" , "number_of_activities"];
    public function activities(){
        return $this->hasMany('App\Model\Activity');
    }
    public function userActivity(User $user){
        $userActivity = [];
        $activities=$this->activities;

        foreach ($activities as $activity){
            if ($activity->imam_id == $user->id){

                $userActivity []= $activity;
            }
        }
        //dd($userActivity);
        return $userActivity;
    }
    public function userCount(User $user){
        $count = 0;
        $activities= $this->userActivity($user);
        foreach ($activities as $activity){
            $count +=$activity->type->point;
        }
        return $count;
    }

}
