<?php

namespace App;
use App\User;
use Auth;

use Illuminate\Database\Eloquent\Model;

class VolunteerProfile extends Model
{
    protected $fillable = [
        'user_id', 'phone','location','industry',
    ];


    public function user(){
    	return $this->belongsTo('App\User');
    }

}
