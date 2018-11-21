<?php

namespace App\Http\Controllers\Imam;

use App\Model\Activity;
use App\Model\ActivityStatus;
use App\Model\City;
use App\Model\Period;
use App\Model\Week;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImamActivities extends Controller
{
    //
    public function index(){
        $today=Carbon::today();
        $week=Week::where('start_date' , '<=' , $today)->where('end_date' , '>=' , $today)->first();
        if ($week == null){
            $today->setWeekStartsAt(Carbon::SATURDAY);
            $today->setWeekEndsAt(Carbon::FRIDAY);

            $from=$today->startOfWeek()->format('Y/m/d');
            $end=$today->endOfWeek()->format('Y/m/d');
            $activity = 15;
            $week = new Week();
            $week->start_date = $from;
            $week->end_date = $end;
            $week->number_of_activities = $activity;
            $week->save();
        }
        $activies=Activity::where('imam_id' , Auth::user()->id)->where('week_id' , $week->id)->get();
        $activies = $activies->sortBy('day');



        $count=$week->userCount(Auth::user());
        $week_count=$week->number_of_activities;

        $activity_percientige = ( $count / $week_count) * 100;

        $color = "red";
        if ($activity_percientige < 30){
            $color = "red";
        } else if($activity_percientige < 80){
            $color = "orange";
        } else {
            $color = "green";
        }

        $toImam = ActivityStatus::where("name" , "toImam")->first();

        return View('Activity.week' , compact('activies' , 'activity_percientige' , 'color' , 'count' , 'week_count' , 'toImam'));
    }
    public function accept($id){
        $activity=Activity::find($id);
        $toImam = ActivityStatus::where("name" , "create")->first();
        $activity->status()->associate($toImam);
        $activity->save();
        return redirect('/imam/activities');
    }
    public function deny($id){
        $activity=Activity::find($id);
        $deny = ActivityStatus::where("name" , "deny")->first();
        $activity->status()->associate($deny);
        $activity->save();
        return redirect('/imam/activities');
    }
    public function create(){
        $cities = City::all();
        $periods = Period::all();
        return View('Activity.add' , compact('cities' , 'periods'));
    }
    public function add(Request $request){
        $imam=Auth::user();
        $day=$request->day;
        $mosque_id = $request->mosque_id;

        $input = $request->all();
        //$tody=Carbon::today();
        $week=Week::where('start_date' , '<=' , $day)->where('end_date' , '>=' , $day)->first();
        $status = ActivityStatus::where('name','create')->first();
        $activity =new Activity();


        $activity->fill($input);
        if ($mosque_id == -1){
            $activity->mosque_id = null;

        }
        $activity->week()->associate($week);
        $activity->imam()->associate($imam);
        $activity->status()->associate($status);
        $activity->save();
        return redirect('/imam/activities');

    }

}
