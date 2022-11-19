<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["title", "excerpt", "body", "slug", "category_id", "user_id"];

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
}
