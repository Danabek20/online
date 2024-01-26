<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Save;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Support\Facades\Auth;



class MineController extends Controller
{
    public function dashboard(){
        $userType = Auth::user()->user_type;
        $products = Product::paginate(8);
        if($userType==1){
            return view('admin.home');
        }else{
            return view('home.index',compact('products'));
        }
    }

    public function indexHomeProduct(){
        $products = Product::paginate(8);
        $saved = Save::all();

        return view('home.index',compact('products','saved'));
    }



    public function descProduct($id){
        $product = Product::findOrFail($id);
        return view('home.product-desc',compact('product',));
    }
    public function descriptionProduct($id){
        $product = Save::findOrFail($id);
        return view('home.desc-product',compact('product',));
    }


    //cart
    public function addToCart(Request $request,$id){
        if (Auth::check()) {

            $product = Product::findOrFail($id);
            // dd($product);
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
    public function addToCartSaved(Request $request,$id){
        if (Auth::check()) {

            $product = Save::findOrFail($id);
            // dd($product);
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
    public function deleteFromCart($id){
        Cart::destroy($id);
        return redirect()->back()->with('message','Product deleted from cart');

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
                'product_price'=>$order->price,
                'total_price'=>$order->total_price,
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
        $orders = Order::where('user_name','Like','%'.$text.'%')->
                        orwhere('email','Like','%'.$text.'%')->
                        orwhere('phone','Like','%'.$text.'%')->
                        paginate(5);

        return view('admin.viewAllOrders',compact('orders'));
    }
    public function updateStatus($id){

        Order::where('id', $id)->update(array('order_status' => 'Accepted'));
        return redirect()->back()->with('message','Order is Accepted');
    }

    //Save

    public function addToSave($id){
        $product = Product::findOrFail($id);
        $saves = DB::table('saves')->where('product_id', $product->id)->first();
        if($saves == null){
        Save::create([
            'product_id'=> $product->id,
            'category'=>$product->category,
            'name'=>$product->name,
            'desc'=>$product->desc,
            'price'=>$product->price,
            'discount_price'=>$product->discount_price,
            'quantity'=>$product->quantity,
            'img'=>$product->img
        ]);
        return redirect()->back()->with('message','Product is saved');
    }else{
        return redirect()->back()->with('message','Product has already been saved');
    }
    }
    public function viewSavedProduct(){
        $saved = Save::all();
        return view('home.viewSavedProduct',compact('saved'));
    }
    public function deleteFromSaved($id){
        Save::destroy($id);
        return redirect()->back()->with('message','Product deleted from Saved');

    }

    public function pdf($id){
        $desc = Order::findOrFail($id);


        $pdf = Pdf::loadView('admin.pdf',compact('desc'));
        return $pdf->download('invoice.pdf');
    }
    public function pfd($id){
        $desc = Order::findOrFail($id);

        return view('admin.pdf',compact('desc'));
    }
}
