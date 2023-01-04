<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all()->sortByDesc('id')->values();
        return view('admin.category',compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'name' =>'required',
            'description' =>'required',
        ]);
        Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect()->route('category.index')->with('message','category created successfully!!');
    }
    public function show($id){
        $category = Category::find($id);
        return view('admin.category-show',compact('category'));
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.category-edit',compact('category'));
    }
    public function update(Request $request,$id){
        $category = Category::find($id);
        $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect()->route('category.index')->with('message','category has been update successfully!!');
    }
    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('error','category has been deleted successfully!');
    }
}
