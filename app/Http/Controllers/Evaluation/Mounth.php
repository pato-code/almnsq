<?php

namespace App\Http\Controllers\Evaluation;

use App\Model\UserGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Mounth as MounthModel;

class Mounth extends Controller
{
    //$mouth=Mounth::where('start_date' , '<=' , $today)->where('end_date' , '>=' , $today)->first();
    public function index()
    {
        $today = Carbon::today();
        $mounth = MounthModel::where('start_date', '<=', $today)->where('end_date', '>=', $today)->first();

        if($mounth == null) {
            $from=$today->startOfMonth()->format('Y/m/d');
            $end=$today->endOfMonth()->format('Y/m/d');
            $mounth = new MounthModel();
            $mounth->start_date = $from;
            $mounth->end_date = $end;
            $mounth->save();
        }
        $userGroup = UserGroup::where("name", "داعيه")->first();
        $daees = $userGroup->users;
        $rates = array();
        $week_count = $mounth->number_of_activities;

        foreach ($daees as $daee) {
            $count = $mounth->userCount($daee);
            $daee_actives = array();
            $daee_actives += ["name" => $daee->name];
            $daee_actives += ["id" => $daee->id];
            $daee_actives += ["rate" => $count];
            $activity_percientige = ($count / $week_count) * 100;
            $daee_actives += ["width" => $activity_percientige];
            if ($activity_percientige < 30) {
                $color = "red";
            } else if ($activity_percientige < 80) {
                $color = "orange";
            } else {
                $color = "green";
            }
            $daee_actives += ["color" => $color];
            array_push($rates, $daee_actives);
        }
        usort($rates, function ($a, $b) {
            return $b['rate'] - $a['rate'];
        });
        $rate_base = 'الشهري';
        return View('Rate.week', compact('rates', 'week_count' , 'rate_base'));
    }
}
