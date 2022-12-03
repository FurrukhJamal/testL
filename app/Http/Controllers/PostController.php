<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use Whoops\Run;

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
        
        // dd(Category::where("slug" ,request("category"))->first());
        //$currentCategory =  Category::where("slug" , request("category"))->first();   
        
        // return [
        //     "posts" => $this->getPost(),
        //     "categories" => Category::all(), //now getting from CategoryDropdown.php
        //     // "test" => "heelo world",
        //     // "currentCategory" => $currentCategory,
            

        // ];
        
        return view("posts.index", [
            "posts" => $this->getPost(),
            "categories" => Category::all(), //now getting from CategoryDropdown.php
            // "test" => "heelo world",
            // "currentCategory" => $currentCategory,
            

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

        return Post::latest()->filter(request(["search", "category", "author"]))->paginate(6)->withQueryString();
        // dd(request(["search"]));
        // Post::latest()->filter(request(["search"]))->get();
    }

    public function create(){
        // if(auth()->guest()){
        //     // abort(403);
        //     abort(Response::HTTP_FORBIDDEN);
        // }
        // if (auth()->user()->username != "Fjk" ){
        //     abort(503);
        // }
        return view("posts.create");
    }

    public function store(){
        $attributes = request()->validate([
            "title" => "required",
            "excerpt" => "required",
            "slug" => ["required", Rule::unique("posts", "slug")],
            "body" => "required",
            "category_id" => ["required", Rule::exists("categories", "id")],
        ]);

        $attributes["user_id"] = auth()->user()->id;

        Post::create($attributes);

        return redirect("/posts");
    }
}
