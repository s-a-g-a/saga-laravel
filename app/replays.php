<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class replays extends Model
{
   	public function complaints(){
    	return $this->belongsTo(complaints::class);
    }
     public function cms_users(){
    	return $this->belongsTo(cms_users::class);

    }
}
