<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy(){
        auth()->logout();

        return redirect("/posts")->with("success", "You are logged out");
    }

    public function create(){
        return view("login.create");
    }

    public function store(){
        $attributes = request()->validate([
            "email" => "required",   //|exists:users,email
            "password" => "required"
        ]);

        if(auth()->attempt($attributes)){
            return redirect("/posts")->with("success", "welcome back!");
        }

        //throw ValidationException::withMessages(["email" => "invalid email or password"]);
        
        //failed validation
        return back()->withInput()->withErrors(["error" => "invalid email or password"]);
    }
}
