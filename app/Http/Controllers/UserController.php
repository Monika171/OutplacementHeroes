<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Skill;
use App\Country;
use App\State;
use App\City;
use App\Designation;
use App\Industry;
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
        $countries = Country::all()->pluck('name','id');
        
        if($profile->state){
        $s = State::where('name', $profile->state)->first();
        $s_id = $s->id;}
        else {
          $s_id = "";
        }

        if($profile->city){
        $c = City::where('name', $profile->city)->first();
        $c_id = $c->id;}
        else {
          $c_id = "";
        }

        $preferred_location = City::where('country_id','101')->pluck('name');
        $recent_designation = Designation::all()->pluck('designation');

        //dd($recent_designation);
        /*$educations = Education::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
        $works = Work::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get(); */
        return view('profile.index', compact('user', 'profile', 'skills','countries','preferred_location','s_id','c_id','recent_designation')); 
    }

    public function store(Request $request){
      $this->validate($request,[

        'phone_number'=>['required', 'numeric', 'regex:/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[0-9]\d{9}$/'],
        'address_line1'=>'required',
        'country'=>'required',
        'state'=>'required',
        'city'=>'required',
        'pincode'=>'required|numeric|digits_between:6,6',
        'experience_years'=>'required',
        'recent_company' => 'sometimes',   
        'start_date' => 'required_with:recent_company',
        'industry' => 'required_with:recent_company',
        'currently_working_here' => 'required_without_all:fresher,end_date',
        'salary_in_thousands'=>'numeric|digits_between:4,5|nullable', 
         //'recent_designation' => 'required_with:recent_company',           
                
                //'phone_number'=>'required|numeric|digits_between:10,10',
        ]);
        
        $fresher = request('fresher');
        $ed = request('end_date');
        $cw = request('currently_working_here');

        if($ed){
          // dd($end_date);
          $end_date = $ed;
        }
        else{
          $end_date = $cw;
        }

        $user_id = auth()->user()->id;

        $country = Country::where('id',request('country'))->first();
        $state = State::where('id',request('state'))->first();
        $city = City::where('id',request('city'))->first();
   		
        Profile::where('user_id',$user_id)->update([
                'phone_number'=>request('phone_number'),
                'address_line1'=>request('address_line1'),        
                'address_line2'=>request('address_line2'),
                'country'=>$country->name,
                'state'=>$state->name,
                'city'=>$city->name,
                'pincode'=>request('pincode'),
                'experience_years'=>request('experience_years'),
                'experience_months'=>request('experience_months'),
                'recent_company'=>request('recent_company'),
                'recent_designation'=>request('recent_designation'),
                'start_date'=>request('start_date'),
                'end_date'=>$end_date,
                'function'=>request('function'),
                'industry'=>request('industry'),
                'preferred_location'=>request('preferred_location'),
                'salary_in_lakhs'=>request('salary_in_lakhs'),
                'salary_in_thousands'=>request('salary_in_thousands'),
                'expected_ctc'=>request('expected_ctc')
                
                
             ]);
        
             return redirect()->back()->with('message','Profile Sucessfully Updated!');
         

            }


            /*public function coverletter(Request $request){
                $this->validate($request,[
                    'cover_letter'=>'required|mimes:pdf,doc,docx|max:20000'
                ]);
                $user_id = auth()->user()->id;
                
                $cover = $request->file('cover_letter')->store('public/files');
                    Profile::where('user_id',$user_id)->update([
                      'cover_letter'=>$cover
                    ]);
    
                return redirect()->back()->with('message','Cover letter Sucessfully Updated!');
        
              
           }*/

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

   public function getStates($id)
	{
		$states = State::where('country_id',$id)->pluck('name','id',);
		
		//$states = State::where('country_id',$id)->pluck('name','id')->orderBy('name','asc')->get();
		return json_encode($states);
		
		
	}
	
		public function getCities($id)
	{
		$cities = City::where('state_id',$id)->pluck('name','id');
		return json_encode($cities);
		
		
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


}
