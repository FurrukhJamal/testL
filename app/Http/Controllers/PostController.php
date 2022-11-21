<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        // $posts = Post::latest();
        // if( request("search")){
        //     $posts->where("title", "like", "%" . request("search") . "%")
        //         ->orWhere("body", "like", "%" . request("search") . "%");
        // }
        
        // dd($posts);
        // return view("posts", [
        //     "posts" => $this->getPost(),
        //     "categories" => Category::all()
        // ]);

        return view("posts.index", [
            "posts" => $this->getPost(),
            "categories" => Category::all()
        ]);
    }

    public function show(Post $post){
        // return view("post", [
        //     "post" => $post
        // ]);

        return view("posts.show", [
            "post" => $post
        ]);
    }

    protected function getPost(){
        // $posts = Post::latest();
        // if( request("search")){
        //     $posts->where("title", "like", "%" . request("search") . "%")
        //         ->orWhere("body", "like", "%" . request("search") . "%");
        // }
        // return $posts->get();

        return Post::latest()->filter()->get();
        // dd(request(["search"]));
        // Post::latest()->filter(request(["search"]))->get();
    }
}