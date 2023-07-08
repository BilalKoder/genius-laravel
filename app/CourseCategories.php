<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseCategories extends Model
{
    use SoftDeletes;

    public function course(){
        return $this->belongsTo('App\Courses', 'course_id');
    }

    public function category(){
        return $this->belongsTo('App\Categories', 'category_id');
    }
}
