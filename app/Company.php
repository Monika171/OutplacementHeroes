<?php

namespace App;
use App\User;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  protected $fillable = [
    'cname', 'user_id', 'slug','address','phone','website','logo','cover_photo','slogan','description','industry'
];

    public function jobs(){
    	return $this->hasMany('App\Job');
    }

    public function getRouteKeyName(){
		return 'slug';
    }
}
