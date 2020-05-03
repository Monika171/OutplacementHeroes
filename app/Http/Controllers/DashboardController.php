<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(){

        return view('admin.index');
    	//posts = Post::latest()->paginate(20);
    	//return view('admin.index',compact('posts'));
    }





}
