<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EnrolledCourses extends Model
{
    use SoftDeletes;
    //

    public function course(){
        return $this->belongsTo('App\Courses', 'course_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
