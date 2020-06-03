<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use Auth;
use App\User;
use App\Country;
use App\State;
use App\City;
use App\Skill;
use App\Industry;
use App\Designation;
use App\Specialization;
use App\Course;


class JobController extends Controller
{
    
  
    
    public function  create(){

        //$skills = Skill::orderBy('skill', 'asc')->get();
        $position = Designation::orderBy('designation', 'asc')->pluck('designation');        
        $course = Course::orderBy('course', 'asc')->pluck('course');
        $specialization = Specialization::orderBy('specialization', 'asc')->pluck('specialization');
        $countries = Country::all()->pluck('name','id');
        
        
        return view('jobs.create', compact('position','course','specialization','countries'));

        //$category = Industry::all()->pluck('industry','id');
        //return view('profile.index', compact('user', 'profile', 'skills','countries','preferred_location','s_id','c_id','recent_designation','industry')); 
    } 

    public function  store(Request $request){

        $this->validate($request,[
           
            'title'=>'required|min:2',
            'position'=>'required',
            'experience'=>'required|min:0',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'pincode'=>'numeric|digits_between:6,6|nullable',
            'number_of_vacancy'=>'numeric|nullable', 
            'last_date'=>'required',
            'status'=>'required',                     
 
            ]);
        
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;

        $country = Country::where('id',request('country'))->first();
        $state = State::where('id',request('state'))->first();
        $city = City::where('id',request('city'))->first();

        //dd($request->all());

        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title'=>request('title'),
            'slug' =>str_slug(request('title')),
            'description'=>request('description'),
            'category_id' =>request('category'),
            'position'=>request('position'),
            'roles'=>request('roles'),
            'function'=>request('function'),
            'salary'=>request('salary'),         
            'experience'=>request('experience'),
            'course'=>request('course'),
            'specialization'=>request('specialization'),
            'gender'=>request('gender'),
            'preferences'=>request('preferences'),  
            'address_line1'=>request('address_line1'),        
            'address_line2'=>request('address_line2'),
            'country'=>$country->name,
            'state'=>$state->name,
            'city'=>$city->name,
            'pincode'=>request('pincode'),
            'number_of_vacancy'=>request('number_of_vacancy'),
            'type'=>request('type'),
            'notice_period'=>request('notice_period'),            
            'last_date'=>request('last_date'),
            'status'=>request('status'),
        ]);
        return redirect()->back()->with('message','Job posted successfully!');
     }

     public function myjob(){
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjob',compact('jobs'));
    }

    public function edit($id){

        $job = Job::findOrFail($id);
        //$skills = Skill::orderBy('skill', 'asc')->get();     
               
        if($job->state){
        $s = State::where('name', $job->state)->first();
        $s_id = $s->id;}
        else {
          $s_id = "";
        }

        if($job->city){
        $c = City::where('name', $job->city)->first();
        $c_id = $c->id;}
        else {
          $c_id = "";
        }

        $position = Designation::orderBy('designation', 'asc')->pluck('designation');        
        $course = Course::orderBy('course', 'asc')->pluck('course');
        $specialization = Specialization::orderBy('specialization', 'asc')->pluck('specialization');
        $countries = Country::all()->pluck('name','id');
        
        return view('jobs.edit',compact('job','s_id','c_id','position','course','specialization','countries'));
        //return view('profile.index', compact('user', 'profile', 'skills','countries','preferred_location','s_id','c_id','recent_designation','industry')); 
    }

    public function update(Request $request,$id){

        $this->validate($request,[
           
            'title'=>'required|min:2',
            'position'=>'required',
            'experience'=>'required|min:0',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'pincode'=>'numeric|digits_between:6,6|nullable',
            'number_of_vacancy'=>'numeric|nullable', 
            'last_date'=>'required',
            'status'=>'required',                     
 
            ]);
        
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;

        $country = Country::where('id',request('country'))->first();
        $state = State::where('id',request('state'))->first();
        $city = City::where('id',request('city'))->first();

        $job = Job::findOrFail($id);
        //$job->update($request->all());

            
        Job::where('id',$id)->update([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title'=>request('title'),
            'slug' =>str_slug(request('title')),
            'description'=>request('description'),
            'category_id' =>request('category'),
            'position'=>request('position'),
            'roles'=>request('roles'),
            'function'=>request('function'),
            'salary'=>request('salary'),         
            'experience'=>request('experience'),
            'course'=>request('course'),
            'specialization'=>request('specialization'),
            'gender'=>request('gender'),
            'preferences'=>request('preferences'),  
            'address_line1'=>request('address_line1'),        
            'address_line2'=>request('address_line2'),
            'country'=>$country->name,
            'state'=>$state->name,
            'city'=>$city->name,
            'pincode'=>request('pincode'),
            'number_of_vacancy'=>request('number_of_vacancy'),
            'type'=>request('type'),
            'notice_period'=>request('notice_period'),            
            'last_date'=>request('last_date'),
            'status'=>request('status'),
            
        ]);
        return redirect()->back()->with('message','Job  Sucessfully Updated!');

    }


    public function show($id,Job $job){

        return view('jobs.show',compact('job'));
    }



    /*public function index(){

         $posts = Post::where('status',1)->latest()->take(4)->get();
         return view('welcome',compact('posts'));

         
        //Dogs::latest()->take(5)->get();
        //$jobs = Job::latest()->limit(10)->get();
        //$companies = Company::get()->random(12);
        //$companies = Company::latest()->limit(12)->get();
       
        //return view('welcome',compact('jobs', 'companies'));
        

        
        TRY GETTING SEEKER INFO IN A SIMILAR WAY
        
        $jobs = Job::all()->take(5);
        $jobs = Job::latest()->limit(10)->where('status',1)->get();
        $categories = Category::with('jobs')->get();
        $posts = Post::where('status',1)->get();
              
        $companies = Company::get()->random(12);
       
    	return view('welcome',compact('jobs','companies','categories'));
    }

   
   

    public function company(){
    	return view('company.index');
    }*/

 




}
