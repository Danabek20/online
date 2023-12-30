<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function productIndex(){
        $products = Product::all();
        return view("admin.product-view",compact("products"));
    }

    public function productAdd(){
        $categories = Category::all();
        return view("admin.product-add",compact("categories"));
    }
    public function productStore(Request $request){
        $request->validate([
            'name'=>'required',
            'desc'=>'required',
            'price'=>'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
       ]);


       $data = $request->all();
       if($request->hasFile('img')){
        $img = $request->file('img');
        $imgName = time().'-'.$img->getClientOriginalName();
        $path = $img->storeAs('product-img',$imgName);
        $data['img']=$imgName;

       }



       Product::create($data);

       return redirect()->route('productIndex')->with('message', 'Product    created successfully!');

    }
    public function productDelete($id){
        Product::findOrFail($id)->delete();
        return redirect()->route('productIndex')->with('message','Product deleted Successfully!');
    }
        public function productEdit($id){
        {
            $categories = Category::all();
            $product = Product::findOrFail($id);
            // dd($category);
            return view('admin.product-edit', compact('product','categories'));
        }
    }
        public function productUpdate(Request $request){
            $request->validate([
                'name'=>'required',
                'desc'=>'required',
                'price'=>'required',
                ]);
                Product::findOrFail($request->id)->update($request->all());
                return redirect()->route('productIndex')->with('message','Product updated successfully');
        }

}
