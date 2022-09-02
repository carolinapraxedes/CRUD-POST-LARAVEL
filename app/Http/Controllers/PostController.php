<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Comments;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(){
        $posts=Post::latest()->paginate(4);

        return view('admin.posts.index',compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request){
        //lógica para criar um novo post
        Post::create($request->all());

        return redirect()->route('posts.index');
    }

    public function show($id){
        $post= Post::find($id);
        $comentarios=$post->comments;
        
        if(!$post){
            return redirect()->route('posts.index');
        }
        
        return view('admin.posts.show',compact('post','comentarios'));
        
    }

    public function edit($id){
        if(!$post = Post::find($id)){
            return redirect()->back();
        }
        return view('admin.posts.edit',compact('post'));
    }

    public function update(StoreUpdatePost $request, $id){
        if(!$post = Post::find($id)){
            return redirect()->back();
        }
        $post->update($request->all());
        return redirect()
                ->route('posts.index')
                ->with('message','Edited post');
       
    }


    public function destroy($id){
        $post= Post::find($id);
        if(!$post){
            return redirect()->route('posts.index');
        }
        $post->delete();
        return redirect()
            ->route('posts.index')
            ->with('message','delet the post',$post->id);
    }

    public function search(Request $request){
        dd($request->search);
    }
   
}
