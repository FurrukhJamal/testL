<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post){
         //dd(request()->user()->id);
        $attributes = request()->validate([
            "comment" => "required"
        ]);
        $post->comments()->create([
            "body" => request("comment"),
            "user_id" => request()->user()->id,
            "post_id" => $post->id
        ]);
        // dd("ffdsdfsd");
        return back();
    }
}
