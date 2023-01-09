<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    
    public function index(){
        $categories = Category::all();
        $posts = Post::all();
        return view('admin.post',compact('categories','posts'));
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'description'=>'required',
        ]);
        $data = [
            'title' =>$request->title,
            'category_id' =>$request->category_id,
            'description' =>$request->description,
            'status' =>$request->status,
        ];

        if($request->hasFile('thumbail')){
            $file = $request->file('thumbail');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'. $extension;
            $file->move(public_path('thumbail_image'), $filename);
            $data['thumbail'] = $filename;
        }
        Post::create($data);
        return redirect()->back()->with('message','Post has been created successfully!!');
    }

    public function show($id){
        $post = Post::find($id);
        return view('admin.post-show',compact('post'));
    }
    public function edit($id){
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.post-edit',compact('post','categories'));
    }
    public function update(Request $request,$id){
        $data = [
            'title' =>$request->title,
            'category_id' =>$request->category_id,
            'description' =>$request->description,
            'status' =>$request->status,
        ];

        if($request->hasFile('thumbail')){
            if($request->old_thumbail){
                File::delete(public_path('thumbail_image/' . $request->old_thumbail));
            }
            $file = $request->file('thumbail');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'. $extension;
            $file->move(public_path('thumbail_image'), $filename);
            $data['thumbail'] = $filename;
        }
        Post::where('id', $id)->update($data);
        
        return redirect()->route('post.index')->with('message','category has been update successfully!!');
    }
    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index')->with('error','post has been deleted successfully!');
    }
}
