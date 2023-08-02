<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'lectures',
        'status',
        'price',
        'sale_price',
        'media',
        'created_by',
        'languages',
        'meta_title',
        'meta_description',
        'video',
        'duration',
        'includes',
        'type',
        'status',
        'is_featured',
        'best_seller'
    ];


    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function categories(){
        return $this->hasMany('App\CourseCategories', 'course_id');
    }
}