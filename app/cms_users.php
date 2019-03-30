<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cms_users extends Model
{
       public function announcements(){
    	return $this->hasMany(announcements::class);
    }
     public function complaints(){
    	return $this->hasMany(complaints::class);
    }
     public function replays(){
        return $this->hasMany(replays::class);
    }
    public function comments(){
    	return $this->hasMany(comments::class);
    }
    public function evaluation(){
        return $this->hasMany(sections::class);
    }
     public function sections(){
    	return $this->hasMany(sections::class);
    }
}
