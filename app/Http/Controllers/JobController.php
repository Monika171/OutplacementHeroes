<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use Auth;
use App\User;
use App\Category;
use App\Post;

//get and show blog, used old controller name (irrelevant name sorry!)
class JobController extends Controller
{
    
    public function __construct(){
        
        $this->middleware(['employer','verified'],['except'=>array('index','show','apply','allJobs','searchJobs','category')]);
    
    }
    
    
    public function index(){

         $posts = Post::where('status',1)->latest()->take(4)->get();
         return view('welcome',compact('posts'));

         
        //Dogs::latest()->take(5)->get();
        //$jobs = Job::latest()->limit(10)->get();
        //$companies = Company::get()->random(12);
        //$companies = Company::latest()->limit(12)->get();
       
        //return view('welcome',compact('jobs', 'companies'));
        

        /*
        TRY GETTING SEEKER INFO IN A SIMILAR WAY
        
        $jobs = Job::all()->take(5);
        $jobs = Job::latest()->limit(10)->where('status',1)->get();
        $categories = Category::with('jobs')->get();
        $posts = Post::where('status',1)->get();
              
        $companies = Company::get()->random(12);
       
    	return view('welcome',compact('jobs','companies','categories'));*/
    }

    /*
    public function show($id,Job $job){

        return view('jobs.show',compact('job'));
    }

    public function company(){
    	return view('company.index');
    }

    public function  create(){
        return view('jobs.create');
    } */




}
