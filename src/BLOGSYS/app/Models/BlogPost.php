<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $guarded = []; 
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function blog_view_log()
    {
        return $this->hasMany('App\Models\BlogViewLog');
    }
    public static function release()
    {
        return static::where('publish_date','<=',date('Y-m-d'));
    }
}
