<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interviews extends Model
{
    protected $table = 'interviews';
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}

