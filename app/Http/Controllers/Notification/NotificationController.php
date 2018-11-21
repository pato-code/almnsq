<?php

namespace App\Http\Controllers\Notification;

use App\Location;
use App\Model\City;
use App\Model\News;
use App\Model\Sermon;
use App\Model\SuggestionType;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=Auth::user();
        $notifications = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\ComplimentNotification')->get();
        //dd($notifications);
        return View('notification.all')->with('notifications',$notifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $notification=Auth::user()->notifications()->where('id',$id)->first();
        //dd($notification->data);





        //dd($compliment);



        return View('notification.show')->with('notification',$notification);
    }
    public function markAsRed($id){
        $notification=Auth::user()->notifications()->where('id',$id)->first()->markAsRead();
        return redirect('/notification');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
