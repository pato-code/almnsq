<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    //public function ShowAddUser()
    public function AddUser(Request $request){
        //Vali
        $input = $request->all();
        $user = new User();
        $user->fill($input);
        $user->save();
        return redirect('/admin/viewUser');
    }
    public function ViewUsers(){

        $users=User::all();
        //dd($users);
        return View('Admin.Users.users',compact('users'));
    }
    public function ActivateUser($id){
        $user=User::find($id);
        $user->status = 1;
        $user->save();
        return redirect('/admin/users');
    }
    public function not(){
        return View('not');
    }
}
