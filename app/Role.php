<?php

namespace App;
use App\User;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $guarded = [];
    
    public function user(){
    	return $this->belongsToMany('App\User');
    }

}
