<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job;
use App\User;
use App\Company;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        
        if(auth::user()->user_type=='employer'){
            $id = auth()->user()->company->id;
            $company = auth()->user()->company->slug;
            
            return redirect()->to('/company/'.$id.'/'.$company);
            
            //return redirect()->to('/company/create');
            //redirect("/user/{$user->id}/profile");
        }

         
        if(auth::user()->user_type=='seeker'){
            $id = auth()->user()->id;
            
            return redirect()->to('/user/'.$id);


            //return redirect()->to('/user/profile');
            }

            if(auth::user()->user_type=='volunteer'){
                $id = auth()->user()->id;
                return redirect()->to('/vseekers');
                //return redirect()->to('/volunteer/'.$id);
    
                }

        $adminRole = Auth::user()->roles()->pluck('name');
            if($adminRole->contains('admin')){
                return redirect('/dashboard');
            }

  
    
    
    //$jobs  = Auth::user()->favorites;
    //return view('home',compact('jobs'));
       
    }
}
