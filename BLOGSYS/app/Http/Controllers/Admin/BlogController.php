<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\FunctionController;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\BlogPost;

class BlogController extends FunctionController
{
    public function index(): View
    {
        $data = BlogPost::get();
        return view('admin.blog.index',['data'=>$data]);
    }
    public function create(): View
    {
        return view('admin.blog.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('BlogStoreRequest', [
            'user_id'=>['required'],
            'tag'=>['required'],
            'thumnail'=>['required','image','mimes:jpg,png,jpeg,gif'],
            'keyword'=>['required'],
            'uniq'=>['required'],
            'title'=>['required'],
            'description'=>['required'],
            'content'=>['required'],
            'publish_date'=>['required']
        ]);
        if($this->uniq_blog_check($request->uniq) === true){
            $thumnail = $this->upload_image($request->file('thumnail'),'blog',$request->uniq);
            $blog = BlogPost::create([
                'user_id'=>$request->user_id,
                'thumnail'=>$thumnail,
                'keyword'=>strtolower($request->keyword),
                'uniq'=>$request->uniq,
                'title'=>$request->title,
                'description'=>$request->description,
                'content'=>json_encode($request->content),
                'publish_date'=>$request->publish_date,
                'tag'=> json_encode(explode(" ",$request->tag)),
            ]);
            return redirect(route('admin.blog.index'))->with('status','blog-created');
        }
        
        return back()->with('error','Create another Title!');
    }
    public function edit($id): View
    {
        $blog = BlogPost::findOrFail($id);
        $tags = "";
        foreach(json_decode($blog->tag) as $tag){ $tags .= $tag.' '; }
        return view('admin.blog.edit',['blog'=>$blog,'tags'=>$tags]);
    }
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('BlogUpdateRequest', [
            'id'=>['required'],
            'user_id'=>['required'],
            'tag'=>['required'],
            'old_thumnail'=>['required'],
            'thumnail'=>['sometimes','image','mimes:jpg,png,jpeg,gif'],
            'keyword'=>['required'],
            'uniq'=>['required'],
            'title'=>['required'],
            'description'=>['required'],
            'content'=>['required'],
            'publish_date'=>['required']
        ]);
        
        $thumnail = $request->old_thumnail;
        if($request->hasFile($request->thumnail)){
            $thumnail = $this->upload_image($request->file('thumnail'),'blog',$request->uniq);
        }
        $blog = BlogPost::whereId($request->id)->update([
            'user_id'=>$request->user_id,
            'thumnail'=>$thumnail,
            'keyword'=>strtolower($request->keyword),
            'uniq'=>$request->uniq,
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>json_encode($request->content),
            'publish_date'=>$request->publish_date,
            'tag'=> json_encode(explode(" ",strtolower($request->tag))),
        ]);
        return redirect(route('admin.blog.index'))->with('status','blog-updated');
    }
    public function delete(Request $request): RedirectResponse
    {
        # code...
    }

}
