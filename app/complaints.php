<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class complaints extends Model
{
    public function comments(){
    	return $this->hasMany(comments::class);
    }
     public function replays(){
    	return $this->hasMany(replays::class);
    }
     public function cms_users(){
    	return $this->belongsTo(cms_users::class);
    }
}
