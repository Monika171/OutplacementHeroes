<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\JvolunteerProfile;
use App\Profile;
use App\User;
use App\Education;
use App\Work;
use App\Country;
use App\State;
use App\City;
use App\Skill;
use App\Industry;
use App\Designation;
use App\Specialization;
use App\Course;
use DB;
use Auth;

class JvolunteerController extends Controller
{
    public function __construct(){
        $this->middleware(['jvolunteer']);

        //uncomment for mandatory verification
        // $this->middleware(['jvolunteer','verified']);
        }  


        public function index(){
          
              $user_id = auth()->user()->id;
              $user = User::find($user_id);
              $skills = Skill::orderBy('skill', 'asc')->get();     
              $jvprofile = JvolunteerProfile::where('user_id', $user->id)->first();
              $countries = Country::all()->pluck('name','id');

              if($jvprofile->country){
                $coun = Country::where('name', $jvprofile->country)->first();
                $coun_id = $coun->id;}
                else {
                  $coun_id = "";
                }
              
              if($jvprofile->state){
                $s = State::where('name', $jvprofile->state)->first();
                $s_id = $s->id;}
                else {
                  $s_id = "";
                }
        
                if($jvprofile->city){
                $c = City::where('name', $jvprofile->city)->first();
                $c_id = $c->id;}
                else {
                  $c_id = "";
                }

              $designation = Designation::orderBy('designation', 'asc')->pluck('designation');
              $industry = Industry::orderBy('industry', 'asc')->pluck('industry');
              return view('jvolunteer.index', compact('user', 'jvprofile', 'skills','countries','coun_id','s_id','c_id','designation','industry')); 
          }

      public function store(Request $request){
        $this->validate($request,[

          'phone'=>['required', 'numeric', 'regex:/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[0-9]\d{9}$/'],
          'address_line1'=>'required',
          'country'=>'required',
          'state'=>'required',
          'city'=>'required',
          'pincode'=>'required|numeric|digits_between:6,6',
          'qualification'=>'required',
          //'industry' => 'required',
          //'designation' => 'required_with:recent_company',                       
          //'phone'=>'required|numeric|digits_between:10,10',
          ]);

          $user_id = auth()->user()->id;

          $country = Country::where('id',request('country'))->first();
          $state = State::where('id',request('state'))->first();
          $city = City::where('id',request('city'))->first();
        
          JvolunteerProfile::where('user_id',$user_id)->update([
            'phone'=>request('phone'),
            'address_line1'=>request('address_line1'),        
            'address_line2'=>request('address_line2'),
            'country'=>$country->name,
            'state'=>$state->name,
            'city'=>$city->name,
            'pincode'=>request('pincode'),
            'qualification'=>request('qualification'),
            'industry'=>request('industry'),
            'designation'=>request('designation'),
            'function'=>request('function'),
            
         ]);
    
         return redirect()->back()->with('message','Profile Sucessfully Updated!');
     

        }


            public function jvprofile_pic(Request $request){
                  $this->validate($request,[
                      'profile_pic'=>'required|mimes:png,jpeg,jpg|max:20000'
                  ]);
                  $user_id = auth()->user()->id;
                  if($request->hasfile('profile_pic')){
                      $file = $request->file('profile_pic');
                      $ext =  $file->getClientOriginalExtension();
                      $filename = 'JVOL-'.time().'.'.$ext;
                      $file->move('uploads/profile_pic/',$filename);
                      JvolunteerProfile::where('user_id',$user_id)->update([
                        'profile_pic'=>$filename
                      ]);
                  return redirect()->back()->with('message','Profile picture Sucessfully Updated!');
                  }
          
            }

            public function delete_jvpic(Request $request){
                  $id = request('id');
                  $p = JvolunteerProfile::findOrFail($id);
                  $filename = $p->profile_pic;

                  JvolunteerProfile::where('id',$id)->update([
                    'profile_pic'=>null
                  ]);
                  
                  //$file->move('uploads/profile_pic/',$filename);
                  File::delete('uploads/profile_pic/'.$filename);
                
                  return redirect()->back()->with('message','Profile picture deleted successfully!');

              }

              public function show($id){
                $user = User::findOrFail($id);

                //Check for correct user
                if(auth()->user()->id !== $user->id){
                  return redirect('/')->with('error','Unauthorised Page');
                }

                return view('jvolunteer.show', compact('user'));

              }

              public function listseekers(Request $request){
                     
                $industrylist = Industry::orderBy('industry', 'asc')->pluck('industry');
                $designationlist = Designation::orderBy('designation', 'asc')->pluck('designation');
                $citylist = City::where('country_id','101')->pluck('name');
                $statelist = State::where('country_id','101')->pluck('name');
                $courselist = Course::orderBy('course', 'asc')->pluck('course');
                $specializationlist = Specialization::orderBy('specialization', 'asc')->pluck('specialization');
                  
                   $industry = $request->get('industry');
                   $recent_designation = $request->get('recent_designation');
                   $city = $request->get('city'); 
                   $state = $request->get('state');
                   $experience_years = $request->get('experience_years');
                   $qualification = $request->get('qualification');
                   $course = $request->get('course'); 
                   $specialization = $request->get('specialization');
    
                   
                   if($industry||$recent_designation||$city||$state||$experience_years||$qualification||$course||$specialization){ 
                       
                        $data = [];
    
                        if($experience_years==0){
                                    $seekersProfile = Profile::where('industry',$industry)                   
                            ->orWhere('recent_designation',$recent_designation)
                            ->orWhere('city',$city)
                            ->orWhere('state',$state)
                            ->orWhere('experience_years','=',$experience_years)
                            ->get();
                            if($seekersProfile->isNotEmpty()){
                            array_push($data,$seekersProfile);
                            }

                            $seekersWork = Work::where('industry',$industry)                   
                            ->orWhere('designation',$recent_designation)                   
                            ->get();
                            if($seekersWork->isNotEmpty()){
                            array_push($data,$seekersWork);
                            }
    
                            $seekersEducation = Education::where('qualification',$qualification) 
                            ->orWhere(function ($query) use ($course, $specialization){
                                $query->where('course',$course)
                                      ->where('specialization',$specialization);
                            })->get();
                            if($seekersEducation->isNotEmpty()){
                            array_push($data,$seekersEducation);
                            }
    
                            $collection = collect($data);
                            $unique =  $collection->unique("user_id");
                            $myArray = $unique->values()->first();                             
                            $seekers = $this->paginate($myArray);
                            //return $unique->values()->all();
                            return view('jvolunteer.dashboard', compact('seekers','industrylist','designationlist','citylist','statelist','courselist','specializationlist'));
                        }
                        else{
    
                            $seekersProfile = Profile::where('industry',$industry)                   
                            ->orWhere('recent_designation',$recent_designation)
                            ->orWhere('city',$city)
                            ->orWhere('state',$state)
                            ->orWhere('experience_years','>=',$experience_years)
                            ->get(); 

                            if($seekersProfile->isNotEmpty()){               
                            array_push($data,$seekersProfile);
                            }

                            $seekersWork = Work::where('industry',$industry)                   
                            ->orWhere('designation',$recent_designation)                   
                            ->get();
                            if($seekersWork->isNotEmpty()){
                            array_push($data,$seekersWork);
                            }
    
                            $seekersEducation = Education::where('qualification',$qualification) 
                            ->orWhere(function ($query) use ($course, $specialization){
                                $query->where('course',$course)
                                      ->where('specialization',$specialization);
                            })->get();
                            if($seekersEducation->isNotEmpty()){
                            array_push($data,$seekersEducation);
                            }
    
                            $collection = collect($data);
                            $unique =  $collection->unique("user_id");
                            if (count($unique) > 0) {
                              $myArray = $unique->values()->first()->sortByDesc('experience_years');                              
                              $seekers = $this->paginate($myArray);
                          } else {
                              $seekers = [];
                          } 
    
                            //return $unique->values()->all();
                            return view('jvolunteer.dashboard', compact('seekers','industrylist','designationlist','citylist','statelist','courselist','specializationlist'));
                   
                        }
                   
                    }else{
                    $seekers = Profile::paginate(10);               
                    return view('jvolunteer.dashboard', compact('seekers','industrylist','designationlist','citylist','statelist','courselist','specializationlist'));
                   }    
    
                //return view('jvolunteer.dashboard', compact('seekers'));

              }

              public function paginate($items, $perPage = 10, $page = null, $options = [])
              {
                      $options = [
                          'path' => Paginator::resolveCurrentPath()
                      ];
                  
                  $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);       
                  $items = $items instanceof Collection ? $items : Collection::make($items);
                  return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
          
              }
          
          


              public function show_profile($id){

                    $user = User::findOrFail($id);
                    return view('jvolunteer.seekerprofile', compact('user'));

              }
}
