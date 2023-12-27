<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MineController extends Controller
{
    public function dashboard(){
        $userType = auth()->user()->user_type;

        if($userType == 1){
            return view("admin.home");
        }else{
            return view("home.index");
        }
    }
}
