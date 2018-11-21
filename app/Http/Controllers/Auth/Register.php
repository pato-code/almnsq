<?php

namespace App\Http\Controllers\Auth;

use App\Model\UserGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Register extends Controller
{
    //
    public function showRegister(){
        $users_group=UserGroup::all();
        dd($users_group);
        return View('Auth.register',compact('users_group'));
    }
}
