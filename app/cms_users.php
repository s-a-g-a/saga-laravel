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
    public function comments(){
    	return $this->hasMany(commnets::class);
    }
}
