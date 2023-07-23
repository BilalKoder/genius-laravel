<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Events extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title','event_date','description','category_id','status','media','created_by','meta_title','meta_description'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function category(){
        return $this->belongsTo('App\Categories', 'category_id');
    }
}
