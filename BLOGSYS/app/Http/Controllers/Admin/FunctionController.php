<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;

class FunctionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
  
    public function upload_image($file,$location,$name)
    {
        $saved_name = $name.'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('public/'.$location,$saved_name);

        return $saved_name;
    }
    public function uniq_blog_check($uniq)
    {
        $check = BlogPost::where('uniq',$uniq)->get();
        if(count($check) > 0){
            return false;
        }
        return true;
    }
    public function remove_special($text)
    {
        $ilegal_char = ["!","@","#","$","%","^","&","*","="];
        return str_replace($ilegal_char,"",$text);
    }
}
