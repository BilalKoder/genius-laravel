<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogs extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','slug','description','tags','status','media','created_by','meta_title','meta_description'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function categories(){
        return $this->hasMany('App\BlogCategories', 'blog_id');
    }
}
