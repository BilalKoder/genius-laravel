<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategories extends Model
{
    //
    public function blog(){
        return $this->belongsTo('App\Blogs', 'blog_id');
    }

    public function category(){
        return $this->belongsTo('App\Categories', 'category_id');
    }
}
