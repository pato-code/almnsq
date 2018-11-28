<?php

namespace App\Http\Controllers\Imam;

use App\Model\Mounth;
use App\Model\Activity;
use App\Model\ActivityStatus;
use App\Model\ActivityType;
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
        $mounth=Mounth::where('start_date' , '<=' , $today)->where('end_date' , '>=' , $today)->first();
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
        if ($mounth == null){

            $from=$today->startOfMonth()->format('Y/m/d');
            $end=$today->endOfMonth()->format('Y/m/d');
            $mounth = new Mounth();
            $mounth->start_date = $from;
            $mounth->end_date = $end;
            $mounth->save();
        }
        //dd($week);
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
        return redirect('/activity/edit/'.$id);
    }
    public function deny($id){
        $activity=Activity::find($id);
        $deny = ActivityStatus::where("name" , "deny")->first();
        $activity->status()->associate($deny);
        $activity->save();
        return redirect('/activity');
    }
    public function create(){
        $cities = City::all();
        $periods = Period::all();
        $types = ActivityType::all();
        return View('Activity.add' , compact('cities' , 'periods' , 'types'));
    }
    public function add(Request $request){
        $imam=Auth::user();
        $day=$request->day;
        $mosque_id = $request->mosque_id;


        $input = $request->all();
        //$tody=Carbon::today();
        $week=Week::where('start_date' , '<=' , $day)->where('end_date' , '>=' , $day)->first();
        $mounth = Mounth::where('start_date' , '<=' , $day)->where('end_date' , '>=' , $day)->first();
        $status = ActivityStatus::where('name','create')->first();
        $activity =new Activity();


        $activity->fill($input);
        if ($mosque_id == -1){
            $activity->mosque_id = null;

        }
        $activity->week()->associate($week);
        $activity->monuth()->associate($mounth);
        $activity->imam()->associate($imam);
        $activity->status()->associate($status);
        $activity->save();
        return redirect('/imam/activities');

    }

    public function edit($id){
        $cities = City::all();
        $periods = Period::all();
        $types = ActivityType::all();
        $activity = Activity::find($id);
        return View('Activity.edit' , compact('cities' , 'periods' , 'types' , 'activity'));
    }
    public function update($id , Request $request){
        $activity = Activity::find($id);
        $activity->fill($request->all());
        $activity->save();
        return redirect('/activity');
    }
    public function delete($id){
        $activity = Activity::find($id);
        $activity->delete();
        return redirect('/activity');
    }

}
