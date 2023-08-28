<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\VolunteerProfile;
use App\Role;
//use Hash;

class VolunteerRegisterController extends Controller
{
    public function volunteerRegister(Request $request){
        
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed',
            'dob'=>'required',
            'gender'=>'required'
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
            'gender' => request('gender'),
            'dob'=>request('dob')

        ]);

        $user->roles()->attach($volunteerRole->id);

        //uncomment for mandatory verification
        // $user->sendEmailVerificationNotification();

       
        return redirect()->back()->with('message','Test Account Successfully Created. Please Login to proceed.');
        
       
    }
}
