<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostCommentController extends Controller
{
    // public function store(Post $post){
    //     request()->validate([
    //         'body' => 'required'
    //     ]);
    //     $post->comments()->create([
    //         'user_id' => request()->user()->id,
    //         'body' => request()->body
    //     ]);
   
    //     return back() ;
    // }
    public function comment(Post $post){

        request()->validate([
            'body' => 'required'
        ]);
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request()->body
        ]);
    
        return view('users.home.comment',compact('post'));
    }

    public function update(Comment $post){
        $attribute =   request()->validate([
            'body' => 'required'
        ]);
        $attribute['user_id'] = request()->user()->id;
        $post->update($attribute);

        // return redirect()->back();
        return view('users.home.edit',compact('post'));
        // return view('users.home.comment',compact('post'));
    }

    public function delete($id){
          Comment::findOrFail($id)->delete();
          return redirect()->back();
    }
    
    public function replay(Comment $comment){
        // dd( $comment);
        request()->validate([
            'body' => 'required'
        ]);

        $comment->replays()->create([
            'user_id' => request()->user()->id,
            'body' => request()->body
        ]);
    
        return view('users.home.replay',compact('comment'));
    }

}
