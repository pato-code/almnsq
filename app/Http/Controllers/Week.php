<?php

namespace App\Http\Controllers;

use App\Model\Activity;
use App\Model\ActivityStatus;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Model\Week as WeekModel;

class Week extends Controller
{
    //
    public function index(){
        $today=Carbon::today();
        $week=WeekModel::where('start_date' , '<=' , $today)->where('end_date' , '>=' , $today)->first();
        if ($week != null)
        {
            $activities=$week->activities;
            $activities = $activities->sortBy('day');
            return View('Week.all' , compact('activities'));
        }
        $today->setWeekStartsAt(Carbon::SATURDAY);
        $today->setWeekEndsAt(Carbon::FRIDAY);

        $from=$today->startOfWeek()->format('Y/m/d');
        $end=$today->endOfWeek()->format('Y/m/d');
        $activity = 0;
        $week = new WeekModel();
        $week->start_date = $from;
        $week->end_date = $end;
        $week->number_of_activities = $activity;
        $week->save();
        return View('Week.add');

    }
    public function updateActivityNumber(){
        return View('Week.add');
    }
    public function add(Request $request){
        $input = $request->all();
        $today=Carbon::today();
        $week=WeekModel::where('start_date' , '<=' , $today)->where('end_date' , '>=' , $today)->first();
        $week->fill($input);
        $week->save();
        return redirect('/week');
    }
    public function accept($id){
        $activity=Activity::find($id);
        $status=ActivityStatus::where("name" , "accept")->first();
        $activity->status()->associate($status);
        $activity->save();
        return redirect('/week');
    }
    public function deny($id){
        $activity=Activity::find($id);
        $status=ActivityStatus::where("name" , "deny")->first();
        $activity->status()->associate($status);
        $activity->save();
        return redirect('/week');
    }
}
