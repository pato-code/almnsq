<?php

namespace App\Http\Controllers;

use App\Model\Activity;
use App\Model\ActivityStatus;
use App\Model\Mosque;
use App\Model\User;
use App\Model\UserGroup;
use App\Notifications\RequestActivity as noti;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Notification;
use App\Model\Week;

class RequestActivite extends Controller
{
    //
    public function add(Request $request){
        $input=$request->all();

        $activity = new Activity;
        $activity->fill($input);
        $activity->day = Carbon::parse($request->day)->format('Y-m-d');
        $today = $activity->day;
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
        $activity->mosque()->associate($request->mosque_id);
        $toImam=ActivityStatus::where("name","toImam")->first();
        $activity->status()->associate($toImam);
        $activity->week()->associate($week);





        if($request->imam_id != 0){
            $activity->imam()->associate($request->imam_id);
            $activity->save();
            $notification =new noti($activity);
            $imam = User::find($request->imam_id);
            Notification::send($imam, $notification);
        }
        else {
            $mosque_id=$request->mosque_id;
            $mosque=Mosque::find($mosque_id);
            //dd($mosque);
            $neighborhood=$mosque->neighborhood;
            $mosque_neighborhood = $neighborhood->mosques->toArray();
            //

            $mos = $mosque_neighborhood[array_rand($mosque_neighborhood)];
            //$mos->load('imam');
            //dd($mos);
            $imam =User::where('id' , $mos["imam_id"])->first();

            $activity->imam()->associate($imam);


            $activity->save();
            $notification =new noti($activity);
            //$imam->send($notification);
            Notification::send($imam,$notification);
            //dd($activity);
        }
        $activity->save();
        $adminGroup = UserGroup::where("name" , "مدير")->first();

        if ($adminGroup != null) {
            $admins = $adminGroup->users;
            //dd($admins);

            $notifi = new noti($activity);

            Notification::send($admins, $notifi);
        }

        return response()->json(
            [
                "error" => true ,
                "message" => "تم الإضافه بنجاح"
            ]
        );

    }
}
