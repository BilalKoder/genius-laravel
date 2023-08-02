<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Webinar extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title','slug','description','video_url','status','media','created_by','meta_title','meta_description'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }
}
