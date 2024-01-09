<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categoryIndex(){
        $categories = Category::paginate(5);
        return view("admin.category-add",compact("categories"));
    }

    public function categoryAdd(){
        $categories = Category::paginate(5);
        return view("admin.category-add",compact("categories"));
    }
    public function categoryStore(Request $request){

        $request->validate([
            'name' => 'required',
        ]);


        Category::create($request->all());
        return redirect()->route('categoryIndex')->with('message', 'Category created successfully!');


    }
    public function categoryEdit($id){
    {

        $category = Category::findOrFail($id);
        // dd($category);
        return view('admin.category-edit', compact('category'));
    }
    }
    public function categoryUpdate(Request $request){
        $request->validate([
            'name'=> 'required',
            ]);
            Category::findOrFail($request->id)->update($request->all());
            return redirect()->route('categoryIndex')->with('message','Category updated successfully');
}
    public function categoryDelete($id){
        Category::findOrFail($id)->delete();
        return redirect()->route('categoryIndex')->with('message','Category deleted Successfully!');
}
}
