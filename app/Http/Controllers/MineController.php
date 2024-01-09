<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;



class MineController extends Controller
{
    public function dashboard(){
        $userType = Auth::user()->user_type;
        $products = Product::all();
        if($userType==1){
            return view('admin.home');
        }else{
            return view('home.index',compact('products'));
        }
    }

    public function indexHomeProduct(){
        $products = Product::all();

        return view('home.index',compact('products'));
    }


    public function cartViewProduct(){
        if(Auth::check()){

            return view('home.cart-view-product');
        }else{

            return redirect()->route('login');
        }


    }
}
