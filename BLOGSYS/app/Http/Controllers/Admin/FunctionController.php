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
        $ilegal_char = ["!","@","#","$","%","^","&","*","=","?",":","=","+",";","`","~"];
        return str_replace($ilegal_char,"",$text);
    }

    public function image_content_upload(Request $request)
    {
        $image = $request->file('upload');
        $saved_name = time().'.'.$image->getClientOriginalExtension();
        $path = $image->storeAs('public/blog/media',$saved_name);
        return response()->json(['fileName'=>$saved_name,'uploaded'=>1,'url'=> url('assets/blog/media/'.$saved_name)]);
    }
}
