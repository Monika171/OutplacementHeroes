<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use Auth;
use App\User;
use App\Industry;
use App\Country;
use App\State;
use App\City;
use App\Designation;



//get and show blog, used old controller name (irrelevant name sorry!)
class JobController extends Controller
{
    
  
    
    public function  create(){
        return view('jobs.create');
    } 

    public function  store(JobPostRequest $request){
        
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;

        $country = Country::where('id',request('country'))->first();
        $state = State::where('id',request('state'))->first();
        $city = City::where('id',request('city'))->first();

        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title'=>request('title'),
            'slug' =>str_slug(request('title')),
            'description'=>request('description'),
            'position'=>request('position'),
            'salary'=>request('salary'),         
            'roles'=>request('roles'),
            'function'=>request('function'),
            'category_id' =>request('category'),            
            'address_line1'=>request('address_line1'),        
            'address_line2'=>request('address_line2'),
            'country'=>$country->name,
            'state'=>$state->name,
            'city'=>$city->name,
            'pincode'=>request('pincode'),
            'type'=>request('type'),
            'notice_period'=>request('notice_period'),
            'status'=>request('status'),
            'last_date'=>request('last_date'),
            'number_of_vacancy'=>request('number_of_vacancy'),
            'course'=>request('course'),
            'specialization'=>request('specialization'),
            'experience'=>request('experience'),
            'gender'=>request('gender'),
            'preferences'=>request('preferences'),       

        ]);
        return redirect()->back()->with('message','Job posted successfully!');
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

   
    public function show($id,Job $job){

        return view('jobs.show',compact('job'));
    }

    public function company(){
    	return view('company.index');
    }*/

 




}
