<?php

namespace App\Http\Controllers;

use App\Model\Suggestion;
use App\Model\SuggestionType;
use App\Model\UserGroup;
use App\Notifications\SuggestionNotification;
use Auth;
use Illuminate\Http\Request;
use Notification;

class SuggestionController extends Controller
{
    //
    public function index()
    {
        //
        $user=Auth::user();
        $notifications = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\SuggestionNotification')->get();
        //dd($notifications);
        return View('suggestion.all')->with('notifications',$notifications);
    }


    public function store(Request $request){

        $input=$request->all();
        $suggestion = new Suggestion;
        $type = SuggestionType::find($request->type_id);
        $suggestion->type()->associate($type);
        $suggestion->fill($input);

        $suggestion->save();





        //dd($suggestion->type);
        $notification = new SuggestionNotification($suggestion , $suggestion->type);
        $adminGroup = UserGroup::where("name" , "مدير")->first();
        if ($adminGroup != null) {
            $admins = $adminGroup->users;



            Notification::send($admins, $notification);
        }
        return response()->json(
            [
                "error" => true ,
                "message" => "تم الإضافه بنجاح"
            ]
        );
    }
    public function notification($id){
        $notification=Auth::user()->notifications()->where('id',$id)->first();
        //dd($notification->data);

        return View('suggestion.show')->with('notification',$notification);
    }
    public function notificationSuggestion($id){
        $notification=Auth::user()->notifications()->where('id',$id)->first()->markAsRead();
        return redirect('/notificationSugesstion');
    }
    public function markAsRed($id){
        $notification=Auth::user()->notifications()->where('id',$id)->first()->markAsRead();
        return redirect('/notificationSuggestion');
    }
}
