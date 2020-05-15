<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;
use App\VolunteerProfile;
use App\Role;
use Hash;

class VolunteerRegisterController extends Controller
{
    public function volunteerRegister(Request $request){
        
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed'
        ]);

        $volunteerRole = Role::where('name', 'volunteer')->first();

    	 $user =  User::create([
            'email' => request('email'),
            'name' => request('name'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
        ]);
      
        VolunteerProfile::create([
            'user_id' => $user->id,

        ]);

        $user->roles()->attach($volunteerRole->id);
        $user->sendEmailVerificationNotification();

       
        return redirect()->back()->with('message','A verification link is sent to your email. Please follow the link to verify it');
        
       
    }
}
