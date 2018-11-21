<?php

namespace App\Http\Controllers;

use App\Model\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //
    public function all(){
        $cities = City::all();
        return View('city.all',compact('cities'));
    }
    public function create(){
        return View('city.create');
    }
    public function store(Request $request){
        $input=$request->all();
        $city = new City();
        $city->fill($input);
        $city->save();

        return redirect('/city/all');

    }
    public function allNeighorhood($id){
        $city= City::where('id',$id)->first();
        $neighborhoods = $city->neighborhoods;
        return response()->json($neighborhoods,200);
    }
    public function allMosques($id){
        $city= City::where('id',$id)->get();
        $mosques = $city->mosques;
        return response()->json($mosques,200);
    }
}
