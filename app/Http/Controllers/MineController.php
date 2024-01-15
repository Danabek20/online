<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


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
            return redirect()->route('login')->with('message','To add to the cart you need to log in!');
        }


    }
    public function cartViewProduct(){
            $user = Auth::user();
            $carts = Cart::all();
            $carts= DB::table('carts')->where('email',$user->email)->get();
            // dd($carts);

            return view('home.cart-view-product',compact('carts'));
    }
    //Order
    public function addToOrder(){
        $user = Auth::user();
        $orders = Cart::all();
        $orders= DB::table('carts')->where('email',$user->email)->get();
        // dd($orders);

        foreach ($orders as $order ) {
            Order::create([
                'user_name'=>$order->user_name,
                'phone'=>$order->phone,
                'email'=>$order->email,
                'address'=>$order->address,
                'product_name'=>$order->product_name,
                'product_price'=>$order->total_price,
                'quantity'=>$order->quantity,
                'img'=>$order->img,
                'order_status'=>"Processing"
            ]);
        }
            $carts = Cart::all();
            $carts= DB::table('carts')->where('email', $user->email)->delete();;
            return redirect()->back()->with('message','Your order is accepted!');


    }
    public function viewAllOrders(){
        $orders = Order::paginate(5);
        return view('admin.viewAllOrders',compact('orders'));
    }
    public function orderSearch(Request $request){
        $text = $request->search;
        $orders = Order::where('product_name','Like','%'.$text.'%')->paginate(5);

        return view('admin.viewAllOrders',compact('orders'));
    }
    public function updateStatus($id){

        Order::where('id', $id)->update(array('order_status' => 'Accepted'));
        return redirect()->back()->with('message','Order is Accepted');
    }
}
