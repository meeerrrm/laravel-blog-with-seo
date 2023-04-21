<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class LandingController extends Controller
{
    
    public function index()
    {
        $blogs = BlogPost::release()->get();

        return view('welcome',['blogs'=>$blogs]);
        // dd($blogs);
    }
}
