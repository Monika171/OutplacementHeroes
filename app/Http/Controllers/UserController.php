<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Skill;
use Auth;


class UserController extends Controller
{
  public function __construct(){
   
    $this->middleware(['seeker','verified']);
    
   //$this->middleware(['seeker','verified'], ['only' => ['index','store','coverletter','resume','profile_pic']]);
   //$this->middleware(['employer','verified'], ['only' => ['show_profile']]);

    }  
  
  
  public function index(){
      //return view('profile.index');
      

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $skills = Skill::orderBy('skill', 'asc')->get();     
        $profile = Profile::where('user_id', $user->id)->first();
        $s= json_encode($user->skills()->allRelatedIds());
        //dd($s);
        //return $s;
        /*$educations = Education::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
        $works = Work::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get(); */
        return view('profile.index', compact('user', 'profile', 'skills','s')); 
    }

    public function store(Request $request){



          $this->validate($request,[

                'location'=>'required',
                'address'=>'required',
                'phone_number'=>['required', 'numeric', 'regex:/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[0-9]\d{9}$/'],
                'job_dept'=>'required',
                'company'=>'required',
                'designation'=>'required',
                'p_location'=>'required',
                //'phone_number'=>'required|numeric|digits_between:10,10',
                

            ]);

        $user_id = auth()->user()->id;
   		
        Profile::where('user_id',$user_id)->update([
                'location'=>request('location'),        
                'address'=>request('address'),
                'phone_number'=>request('phone_number'),
                'job_dept'=>request('job_dept'),
                'experience'=>request('experience'),
                'company'=>request('company'),
                'designation'=>request('designation'),
                'p_location'=>request('p_location'),
                'salary'=>request('salary'),
                'bio'=>request('bio')
                
             ]);

        /*User::where('id',$user_id)->update([
              'job_dept' => request('job_dept'),
          ]);*/
        
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

                    /*$cover = $request->file('cover_letter')->storeAs('OPH'.time(), $request->user()->id)->store('public/files');

                    Profile::where('user_id',$user_id)->update([
                      'cover_letter'=>$cover
                    ]);*/
                
                                 
                      
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
            $filename = 'OPH-'.time().'.'.$ext;
            $file->move('uploads/profile_pic/',$filename);
            Profile::where('user_id',$user_id)->update([
              'profile_pic'=>$filename
            ]);
        return redirect()->back()->with('message','Profile picture Sucessfully Updated!');
        }
 
   }



   public function show_profile($id){

    $user = User::findOrFail($id);

    //Check for correct user
    if(auth()->user()->id !== $user->id){
      return redirect('/')->with('error','Unauthorised Page');
    }

    return view('listseeker.show', compact('user'));
    //return view('welcome',compact('jobs', 'companies'));

  }
  
   /*public function show_profile(){

    $seekers = Profile::get();

    return view('listseeker.index', compact('seekers'));

   }*/

}
