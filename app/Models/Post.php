<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["thumbnail" , "title", "excerpt", "body", "slug", "category_id", "user_id"];

    // protected $with = ["category", "author"];

    // public function getRouteKeyName(){
    //     return "slug";
    // }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // public function user(){ //user_id foriegnkey
    //     return $this->belongsTo((User::class));
    // }

    public function author(){ 
        return $this->belongsTo(User::class, "user_id");
    }

    // public function scopeFilter($query){
    //     if( request("search")){
    //         $query->where("title", "like", "%" . request("search") . "%")
    //             ->orWhere("body", "like", "%" . request("search") . "%");
    //     }
    // }
    public function scopeFilter($query , $filters = []){
        // if($filters["search"] ?? false){
        //     $query->where("title", "like", "%" . request("search") . "%")
        //         ->orWhere("body", "like", "%" . request("search") . "%");
        // }

        $query->when($filters["search"] ?? false , function ($query, $search){
            $query->where(fn($query)=>
                $query->where("title", "like", "%" . $search . "%")
                ->orWhere("body", "like", "%" . $search . "%")
            );
        });

        // $query->when($filters["category"] ?? false , function ($query, $category){
        //     $query->whereExists(function($query){
        //         $query->from("categories")
        //         ->whereColumn("categories.id", "posts.category_id")
        //         ->where("categories.slug", $category);
        //     });
        // });

        $query->when($filters["category"] ?? false , function ($query, $category){
            $query->whereHas("category", fn($query) =>
                $query->where("slug", $category)
            );
        });

        $query->when($filters["author"] ?? false , function ($query, $author){
            $query->whereHas("author", fn($query) =>
                $query->where("username", $author)
            );
        });
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
