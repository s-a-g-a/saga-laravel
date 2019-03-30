<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    public function cms_users(){
    	return $this->hasMany(cms_users::class);
    }

}
