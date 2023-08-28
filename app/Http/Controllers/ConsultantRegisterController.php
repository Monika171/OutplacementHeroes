<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Company;
use App\consultant;

use Hash;

class ConsultantRegisterController extends Controller
{
    public function consultantRegister(Request $request){
        
        $this->validate($request,[
            'cname'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255',
            'password'=>'required|string|min:8|confirmed'
        ]);

        $employerRole = Role::where('name', 'consultant')->first();

    	 $user =  User::create([
            'email' => request('email'),
            'name' => request('name'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
        ]);
        consultant::create([
                'user_id' => $user->id,
                'cname' => request('cname'),
                'slug'=>str_slug(request('cname')),
                'authority_designation' => request('authority_designation'),
            ]);

        $user->roles()->attach($employerRole->id);

        // $user->sendEmailVerificationNotification();
   
        return redirect()->back()->with('message','Test Account Successfully Created. Please Login to proceed.');
       
    }
}
