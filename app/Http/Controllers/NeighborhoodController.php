<?php

namespace App\Http\Controllers;

use App\Model\City;
use App\Model\Neighborhood;
use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{
    //
    public function all(){
        $neighborhoods=Neighborhood::all();
        return View('neighborhood.all',compact('neighborhoods'));
    }
    public function create(){
        $cities = City::all();
        return View('neighborhood.create',compact('cities'));
    }
    public function store(Request $request){
        $input=$request->all();
        $neighborhood = new Neighborhood();
        $neighborhood->fill($input);
        $neighborhood->save();

        return redirect('/neighborhood/all');
    }
    public function allMosques($id){
        $neighborhood= Neighborhood::where('id',$id)->first();
        //dd($neighborhood);
        $mosques = $neighborhood->mosques;
        return response()->json($mosques,200);
    }
}
