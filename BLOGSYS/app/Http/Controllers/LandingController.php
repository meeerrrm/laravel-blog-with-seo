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
    }
    public function detail($uniq)
    {
        $blog = BlogPost::where('uniq',$uniq)->first();
        return view('blog-detail',['blog'=>$blog]);
    }
}
