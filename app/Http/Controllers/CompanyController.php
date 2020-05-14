<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Company;
use App\Job;
use App\User;
use Auth;




class CompanyController extends Controller
{

    public function __construct(){
        $this->middleware(['employer','verified'],['except'=>array('index','company')]);
    }


    public function index($id, Company $company){
    	//$jobs = Job::where('user_id',$id)->get();
    	return view('company.index',compact('company'));
    }

    public function company(){
        $companies = Company::latest()->paginate(20);
        return view('company.company',compact('companies'));
      }
      

    public function create(){
    	return view('company.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'address'=>'required',
            'phone'=>['required', 'numeric', 'regex:/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[0-9]\d{9}$/'],
            'website'=>'required',
            'description'=>'required',
            'industry'=>'required',
            ]);

        $user_id = auth()->user()->id;
        
        Company::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'phone'=>request('phone'),
            'website'=>request('website'),
            'slogan'=>request('slogan'),
            'description'=>request('description'),
            'industry'=>request('industry'),
        ]);

        /*User::where('id',$user_id)->update([
            'job_dept' => request('job_dept'),
        ]);*/
      
        return redirect()->back()->with('message','Company Sucessfully Updated!');

}

        public function coverPhoto(Request $request){
            $this->validate($request,[
                'cover_photo'=>'required|mimes:png,jpeg,jpg|max:20000'
            ]);

            $user_id = auth()->user()->id;
            if($request->hasfile('cover_photo')){

                $file = $request->file('cover_photo');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/coverphoto/',$filename);
                Company::where('user_id',$user_id)->update([
                    'cover_photo'=>$filename
                ]);
            }
            return redirect()->back()->with('message','Company coverphoto Sucessfully Updated!');

        }


        public function companyLogo(Request $request){
            $this->validate($request,[
                'company_logo'=>'required|mimes:png,jpeg,jpg|max:20000'
            ]);

            $user_id = auth()->user()->id;
            if($request->hasfile('company_logo')){
    
                $file = $request->file('company_logo');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/logo/',$filename);
                Company::where('user_id',$user_id)->update([
                    'logo'=>$filename
                ]);
            }
            return redirect()->back()->with('message','Company logo Sucessfully Updated!');
    
        }

}
