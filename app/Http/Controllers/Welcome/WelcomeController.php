<?php

namespace App\Http\Controllers\Welcome;

use App\Location;
use App\Model\City;
use App\Model\News;
use App\Model\Sermon;
use App\Model\SuggestionType;
use App\Model\User;
use App\Model\UserGroup;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    //
    public function welcome()
    {
        $news = News::all();

        $sermons = Sermon::all();
        $locations = Location::all();
        $cities = City::all();
        $suggesstions_type = SuggestionType::all();
        $userGroup = UserGroup::where('name' , 'داعيه')->first();
        $imams= User::where('group_id' , $userGroup->id)->get();
        $suggesstions = [];
        $compliments = [];
        $activites = [];
        if (Auth::user()) {
            $compliments = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\ComplimentNotification')->get();
            $suggesstions = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\SuggestionNotification')->get();
            $activites = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\RequestActivity')->get();

        }

        //dd($compliment);


        return View('welcome', compact('news', 'sermons', 'locations', 'cities', 'compliments', 'suggesstions', 'suggesstions_type' , 'imams' , 'activites'));
    }

    public function index()
    {
        $news = News::all();

        $sermons = Sermon::all();
        $locations = Location::all();
        $cities = City::all();
        return View('welcome', compact('news', 'sermons', 'locations', 'cities'));
    }
}
