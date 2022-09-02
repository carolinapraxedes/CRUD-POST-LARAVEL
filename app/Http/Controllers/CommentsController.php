<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;

use App\Models\Comments;


class CommentsController extends Controller
{
    public function storeComment(StoreCommentRequest $request){
       
        Comments::create($request->all());
        
        return redirect()->route('posts.show',[$request->posts_id]);
        
    }

    public function show($id){
        $comments= Comments::find($id);
        if(!$comments){
            return redirect()->route('posts.index');
        }
        return view('admin.posts.show',compact('comments'));
        
    }
}
