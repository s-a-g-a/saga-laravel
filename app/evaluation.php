<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluation extends Model
{
    //
     public function cms_users(){
    	return $this->belongsTo(cms_users::class);

    }
}
