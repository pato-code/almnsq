<?php

namespace App\Http\Controllers\Evaluation;

use App\Model\Mounth;
use App\Model\User;
use App\Model\UserGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Week as WeekModel;

class Week extends Controller
{
    //
    public function index(){
        $today=Carbon::today();
        $week=WeekModel::where('start_date' , '<=' , $today)->where('end_date' , '>=' , $today)->first();

        if ($week == null) {
            $today->setWeekStartsAt(Carbon::SATURDAY);
            $today->setWeekEndsAt(Carbon::FRIDAY);

            $from=$today->startOfWeek()->format('Y/m/d');
            $end=$today->endOfWeek()->format('Y/m/d');
            $activity = 15;
            $week = new WeekModel();
            $week->start_date = $from;
            $week->end_date = $end;
            $week->number_of_activities = $activity;
            $week->save();
    }
        $userGroup = UserGroup::where("name", "داعيه")->first();
        $daees = $userGroup->users;
        $rates = array();
        $week_count = $week->number_of_activities;
        foreach ($daees as $daee) {
            $count=$week->userCount($daee);
            $daee_actives = array();
            $daee_actives += ["name" => $daee->name];
            $daee_actives += ["id" => $daee->id];
            $daee_actives += ["rate" => $count];
            $activity_percientige = ( $count / $week_count) * 100;
            $daee_actives += ["width" => $activity_percientige];
            if ($activity_percientige < 30){
                $color = "red";
            } else if($activity_percientige < 80){
                $color = "orange";
            } else {
                $color = "green";
            }
            $daee_actives += ["color" => $color];
            array_push($rates,$daee_actives);
        }
        usort($rates, function($a, $b) {
            return $b['rate'] - $a['rate'] ;
        });
        $rate_base = 'الأسبوعي';
        return View('Rate.week' , compact('rates' , 'week_count' , 'rate_base'));

    }
}
