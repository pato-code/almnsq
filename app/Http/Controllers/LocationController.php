<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function all(){
        $locations=Location::all();
        return View('location.all',compact('locations'));
    }
    public function create(){
        return View('location.create');
    }
    public function store(Request $request){
        $input=$request->all();
        $location = new Location();
        $location->fill($input);
        $location->save();

        return redirect('/location/all');
    }
}
