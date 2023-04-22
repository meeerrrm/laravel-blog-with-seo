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
    public function tag()
    {
        $tag = $this->get_all_tag();
        return view('blog-tag',['tags'=>$tag]);
    }

    public function tag_detail($tag)
    {
        $blog = $this->get_blog_with_tag($tag);
        return view('blog-tag-detail',['blogs'=>$blog,'tag'=>$tag]);
    }

    public function get_all_tag()
    {
        $tag = BlogPost::select('tag')->get();
        $new_tag = [];
        foreach($tag as $tg){
            foreach(json_decode($tg->tag) as $t){
                array_push($new_tag,$t);
            }
        }
        return array_count_values($new_tag);
    }

    public function get_blog_with_tag($tag)
    {
        return BlogPost::release()->where('tag','LIKE','%'.$tag.'%')->get();

    }
}
