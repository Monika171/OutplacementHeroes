<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
    public function index(){

        $jobs = Job::all()->take(5);
        return view('welcome',compact('jobs'));
    	/*$jobs = Job::latest()->limit(10)->where('status',1)->get();
        $categories = Category::with('jobs')->get();
        $posts = Post::where('status',1)->get();
              
        $companies = Company::get()->random(12);
       
    	return view('welcome',compact('jobs','companies','categories'));*/
    }

    public function show($id,Job $job){

        return view('jobs.show',compact('job'));
    }

    /*public function company(){
    	return view('company.index');
    }*/

    public function  create(){
        return view('jobs.create');
    }




}
