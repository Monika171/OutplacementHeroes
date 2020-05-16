<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\VolunteerProfile;
use App\User;
use App\Profile;
use Auth;

class VolunteerController extends Controller
{


    public function __construct(){
   
        $this->middleware(['volunteer','verified']);
     
    
    }  


    public function index(){
    	return view('volunteer.index');
    }

    public function store(Request $request){



        $this->validate($request,[

              'phone'=>['required', 'numeric', 'regex:/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[0-9]\d{9}$/'],
              'location'=>'required',
              'industry'=>'required',
  
          ]);

      $user_id = auth()->user()->id;
         
      VolunteerProfile::where('user_id',$user_id)->update([
             
              'phone'=>request('phone'),
              'location'=>request('location'), 
              'industry'=>request('industry'),
              
           ]);

      
           return redirect()->back()->with('message','Profile Sucessfully Updated!');

          }

          public function show($id){
            $user = User::findOrFail($id);

            //Check for correct user
            if(auth()->user()->id !== $user->id){
              return redirect('/')->with('error','Unauthorised Page');
            }
        
            return view('volunteer.show', compact('user'));
            //return view('welcome',compact('jobs', 'companies'));
    
       }

          public function listseekers(){

            $seekers = Profile::get();
        
            return view('volunteer.dashboard', compact('seekers'));
        
           }
        
        
           public function show_profile($id){
        
                $user = User::findOrFail($id);
                return view('volunteer.seekerprofile', compact('user'));
                //return view('welcome',compact('jobs', 'companies'));
        
           }



}
