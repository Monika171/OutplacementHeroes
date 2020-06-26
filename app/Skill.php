<?php

namespace App;
use App\User;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function skillsUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function skillsJobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
