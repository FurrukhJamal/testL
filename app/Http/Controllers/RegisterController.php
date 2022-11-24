<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view("register.create");
    }

    public function store(){
        //dd(request()->all());
        
        $attributes = request()->validate([
            "name" => "required|max:255",
            "username" => "required|max:255|unique:users,username",
            "email" => ["required", "email", "max:255", Rule::unique("users", "email")], //Rule::unique("users", "email")
            "password" => "required|max:25|min:6",
        ]);

        User::create($attributes);

        return redirect("/posts");
    }
}
