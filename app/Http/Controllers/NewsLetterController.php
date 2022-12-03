<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsLetterController extends Controller
{
    public function __invoke()
    {
        request()->validate(["email" => "email|required"]);

        try {
            $newsletter = new Newsletter();
            $newsletter->subscribe(request("email"));    
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                "email" => "This email could not be added to our newsletter"
            ]);
        }

        
        return back()->with("success", "You are now signed up for our newsletter");
    }
}
