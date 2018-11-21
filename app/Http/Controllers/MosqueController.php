<?php

namespace App\Http\Controllers;

use App\Location;
use App\Model\City;
use App\Model\Mosque;
use App\Model\User;
use App\Model\UserGroup;
use Hash;
use Illuminate\Http\Request;

class MosqueController extends Controller
{
    //
    public function create(){


        $cities = City::all();
        $locations = Location::all();
        return View('mosque.create',compact('cities' , 'locations' ));
    }
    public function store(Request $request){
        $input=$request->all();
        $mosque = new Mosque();
        $mosque->fill($input);
        $mosque->save();

        return redirect('/mosque/all');

    }
    public function all(){

        $mosques=Mosque::all();
        $group=UserGroup::where("name" , "داعيه")->first();
        $imams = User::where("group_id" , $group->id)->get();
        //$locations = Location::all();
        return View('mosque.all',compact('mosques' , 'imams' ));
    }
    public function addImam(Request $request,$id){
        $mosque=Mosque::find($id);
        $name=$request->input('name');
        $imam=User::where('name' , $name)->first();
        if($imam == null){
          return redirect('/mosque/imam/'.$mosque->id.'/'.$name);
        }
        $mosque->imam()->associate($imam);
        $mosque->save();
        return redirect('/mosque/all');
    }
    public function addNewImamShow($id,$name){
        return View('mosque.imam' , compact('id' , 'name'));
    }
    public function addNewImam(Request $request){
        $input=$request->all();
        $imam=new User;
        $imam->fill($input);
        $imam->password = Hash::make($input["password"]);
        $imam_group = UserGroup::where("name" , "داعيه")->first();
        $imam->group()->associate($imam_group);
        $imam->status = 1;
        $imam->save();

        $mosque_id=$input["mosque"];
        $mosque = Mosque::find($mosque_id);
        $mosque->imam()->associate($imam);
        $mosque->save();
        return redirect('/mosque/all');
    }
}
