<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

Route::get("/posts", [PostController::class, "index"]
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
    // $posts = Post::latest();
    // if( request("search")){
    //     $posts->where("title", "like", "%" . request("search") . "%")
    //         ->orWhere("body", "like", "%" . request("search") . "%");
    // }
    
    
    // return view("posts", [
    //     "posts" => $posts->get(),
    //     "categories" => Category::all()
    // ]);
)->name("homePosts");




Route::get("/posts/{post:slug}", [PostController::class, "show"] 
    // return view("post", [
    //     "post" => $post
    // ]);
)->where("post", "[A-Za-z_\-0-9]+");





// Route::get("/categories/{category:slug}", function(Category $category){
//     return view("posts.index", [
//         "posts" => $category->posts->load(["category", "author"]),
//         "currentCategory" => $category,
//         "categories" => Category::all()
//     ]);  
// })->name("category");


// Route::get("/authors/{author:username}", function(User $author){
//     return view("posts.index", [
//         "posts" => $author->posts->load(["category", "author"]),
//         "categories" => Category::all() //fixed in categoryComponent.php
//     ]);  
// });


Route::get("/register", [RegisterController::class , "create"]);
Route::post("/register", [RegisterController::class , "store"]);

