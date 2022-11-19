<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get("/posts/{post}", function($id){
//     // $post = [
//     //     "title" => "Some title",
//     //     "body" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget augue interdum, facilisis ligula consectetur, mattis erat. Etiam malesuada dolor faucibus arcu blandit, vitae dictum ante dignissim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc ullamcorper pellentesque volutpat. Phasellus sit amet eros in mauris scelerisque consequat nec quis urna. Sed placerat diam at aliquam venenatis. Pellentesque ultricies neque risus, ac facilisis purus consectetur non. Curabitur sapien augue, mollis ac fringilla non, sodales ut purus. Aliquam non justo in leo posuere hendrerit. Phasellus a consequat enim, eget semper mauris. Duis sed libero cursus, volutpat elit non, varius dui. Aenean a nisl et lectus facilisis varius nec eu orci. Sed vel consequat nibh, id ornare risus. Vestibulum vel nisl diam."
//     // ];
//     return view("post", [
//         "post" => Post::findorFail($id)
//     ]);
// })->where("post", "[A-Za-z\-0-9]+");

Route::get("/posts/{post:slug}", function(Post $post){
    return view("post", [
        "post" => $post
    ]);
})->where("post", "[A-Za-z_\-0-9]+");




Route::get("/posts", function(){
    // $posts = [[
    //     "title" => "First Title",
    //     "slug" => "first-title",
    //     "excerpt" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget augue interdum,"
    // ],
    // [
    //     "title" => "Second Title",
    //     "slug" => "second-title",
    //     "excerpt" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget augue interdum,"
    // ],
    // [
    //     "title" => "Third Title",
    //     "slug" => "third-title",
    //     "excerpt" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget augue interdum,"
    // ],
    // ];
    // DB::listen(function($query){
    //     logger($query->sql, $query->bindings);
    // });
    
    // return view("posts", [
    //     "posts" => Post::all()
    // ]);

    return view("posts", [
        "posts" => Post::latest()->with("category", "author")->get()
    ]);
});

Route::get("/categories/{category:slug}", function(Category $category){
    return view("posts", [
        "posts" => $category->posts->load(["category", "author"])
    ]);  
});


Route::get("/authors/{author:username}", function(User $author){
    return view("posts", [
        "posts" => $author->posts->load(["category", "author"])
    ]);  
});

