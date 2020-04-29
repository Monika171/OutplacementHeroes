<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;


class UserController extends Controller
{
    public function index(){
    	return view('profile.index');
    }

    public function store(Request $request){

          $this->validate($request,[

                'address'=>'required',
                'bio'=>'required',
                //'phone_number'=>'required|numeric|digits_between:10,10',
                'phone_number'=>['required', 'numeric', 'regex:/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[0-9]\d{9}$/'],

            ]);

        $user_id = auth()->user()->id;
   		
        Profile::where('user_id',$user_id)->update([
                         
                'address'=>request('address'),
                'experience'=>request('experience'),
                'bio'=>request('bio'),
                'phone_number'=>request('phone_number')
             ]);
             return redirect()->back()->with('message','Profile Sucessfully Updated!');

            }


            public function coverletter(Request $request){
                $this->validate($request,[
                    'cover_letter'=>'required|mimes:pdf,doc,docx|max:20000'
                ]);
                $user_id = auth()->user()->id;
                $cover = $request->file('cover_letter')->store('public/files');
                    Profile::where('user_id',$user_id)->update([
                      'cover_letter'=>$cover
                    ]);
                return redirect()->back()->with('message','Cover letter Sucessfully Updated!');
        
              
           }

           public function resume(Request $request){
            $this->validate($request,[
                'resume'=>'required|mimes:pdf,doc,docx|max:20000'
            ]);
              $user_id = auth()->user()->id;
              $resume = $request->file('resume')->store('public/files');
                Profile::where('user_id',$user_id)->update([
                  'resume'=>$resume
                ]);
            return redirect()->back()->with('message','Resume Sucessfully Updated!');
    
    
    
       }


       public function profile_pic(Request $request){
        $this->validate($request,[
            'profile_pic'=>'required|mimes:png,jpeg,jpg|max:20000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasfile('profile_pic')){
            $file = $request->file('profile_pic');
            $ext =  $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/profile_pic/',$filename);
            Profile::where('user_id',$user_id)->update([
              'profile_pic'=>$filename
            ]);
        return redirect()->back()->with('message','Profile picture Sucessfully Updated!');
        }
 
   }



}
