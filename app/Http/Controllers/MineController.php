<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

use Illuminate\Support\Facades\Auth;



class MineController extends Controller
{
    public function dashboard(){
        $userType = Auth::user()->user_type;
        $products = Product::paginate(3);
        if($userType==1){
            return view('admin.home');
        }else{
            return view('home.index',compact('products'));
        }
    }

    public function indexHomeProduct(){
        $products = Product::paginate(3);

        return view('home.index',compact('products'));
    }


    public function cartViewProduct(){
        return view('home.cart-view-product');
    }
    
    public function descProduct($id){
        $product = Product::findOrFail($id);
        return view('home.product-desc',compact('product'));
    }

    public function addToCart(Request $request,$id){
        if (Auth::check()) {
            
            $product = Product::findOrFail($id);
            $user = Auth::user();

            if($product->discount_price==NULL){
                $price = $product->price;
               }else{
                $price = $product->discount_price;
               }
    
               $total_price = $request->quantity*$price;
               Cart::create([
                'product_id'=>$product->id,
                'user_id'=>$user->id,
                'user_name'=>$user->name,
                'email'=>$user->email,
                'phone'=>$user->phone,
                'address'=>$user->address,
                'product_name'=>$product->name,
                'img'=>$product->img,
                'price'=>$price,
                'total_price'=>$total_price,
                'quantity'=>$request->quantity
               ]);
               return redirect()->route('cartViewProduct');
    
        }else{
            return redirect()->route('login')->with('message','To add to cart you need to log in!');
        }

        
    }
}
