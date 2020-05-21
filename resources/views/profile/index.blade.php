@extends('layouts.main')

@section('select2css')
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')

<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Edit Profile Information</h1>
              </div>
          </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row">

        <div class="col-md-3">
            @if(empty(Auth::user()->profile->profile_pic))
            <img src="{{asset('profile_pic/man.jpg')}}" width="100" style="width: 100%;">
            @else
            <img src="{{asset('uploads/profile_pic')}}/{{Auth::user()->profile->profile_pic}}" width="100" style="width: 100%;">

            @endif

            <br>
            <br>
            <form action="{{route('profile_pic')}}" method="POST" enctype="multipart/form-data">@csrf

                <div class="card">
                    <div class="card-header">Update profile picture</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="profile_pic">
                        <br>
                        <button class="btn btn-success float-right" type="submit">Update</button>
                    
                        @if($errors->has('profile_pic'))
                            <div class="error" style="color: red;">{{$errors->first('profile_pic')}}</div>
                        @endif
                    </div>
                </div>
            </form>
    



        
        </div>

        <div class="col-md-5">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            
            @endif
            
            <div class="card">
                <div class="card-header">Update Profile</div>
                <form action="{{route('profile.create')}}" method="POST">@csrf


                <!--location needs dropdown list to choose from-->
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Current Location</label>
                        <input type="text" class="form-control" name="location" value="{{Auth::user()->profile->location}}">
                        @if($errors->has('location'))
                        <div class="error" style="color: red;">{{$errors->first('location')}}</div>
                        @endif
                    </div>


                
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{Auth::user()->profile->address}}">
                        @if($errors->has('address'))
                         <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" class="form-control" name="phone_number" value="{{Auth::user()->profile->phone_number}}">
                        @if($errors->has('phone_number'))
                            <div class="error" style="color: red;">{{$errors->first('phone_number')}}</div>
                        @endif
                                      
                    </div>

                    <!--<div class="form-group">
                        <label for="">Pillbox</label>
                        <select class="js-example-basic-single" name="state">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyom</option>
                            <option value="WY">W</option>
                            <option value="WY">Wyoming</option>
                          </select>                                      
                    </div>-->

                    {{--<select class="form-control" name="type">
                        <option value="fulltime"{{$job->type=='fulltime'?'selected':''}}>fulltime</option>
                        <option value="partime"{{$job->type=='partime'?'selected':''}}>partime</option>
                        <option value="casual"{{$job->type=='casual'?'selected':''}}>casual</option>
                    </select>--}}

                    <div class="form-group">
                        <label for="job_dept">Previous Job Department</label>
                        <input class="form-control" value="{{Auth::user()->profile->job_dept}}" name="job_dept" list="job_dept">
                            <datalist id="job_dept">
                                <option value="Accounting">
                                <option value="Application Programming">
                                <option value="Analytics">
                                <option value="Airline">
                                <option value="Bank">
                                <option value="BPO">
                                <option value="Business Intelligence">
                                <option value="Content Writing">
                                <option value="Consultant">
                                <option value="Corporate Planning">
                                <option value="Client Server">
                                <option value="DBA">
                                <option value="Engineering">
                                <option value="Ecommerce">
                                <option value="ERP">
                                <option value="Export Import">
                                <option value="EDP">
                                <option value="Film">
                                <option value="Graphic Designer">
                                <option value="HR">
                                <option value="Hotel">
                                <option value="IT">
                                <option value="Interior Design">
                                <option value="Logistics">
                                <option value="Legal">
                                <option value="Marketing">
                                <option value="Merchandiser">
                                <option value="Mainframe">
                                <option value="Middleware">
                                <option value="Maintenance">
                                <option value="Network administrator">
                                <option value="Packaging">
                                <option value="Pharma">
                                <option value="Sales">
                                <option value="Shipping">
                                <option value="Secretary">
                                <option value="Security">
                                <option value="System Programming">
                                <option value="Software Services">
                                <option value="Site Engineering">
                                <option value="Telecom Software">
                                <option value="Telecom/ISP">
                                <option value="Testing">
                                <option value="Teacher">
                                <option value="VLSI">
                            </datalist>
                            @if($errors->has('job_dept'))
                            <div class="error" style="color: red;">{{$errors->first('job_dept')}}</div>
                           @endif
                        
                    </div>


                    <div class="form-group">
                        <label for="experience">Experience Details: </label>
                        <select name="experience" class="form-control">
                             @for ($i = 0; $i <= 50; $i++)
                            <option value="{{ $i }}" {{Auth::user()->profile->experience==$i?'selected':''}}>{{ $i }} &nbsp; year(s)</option>
                            @endfor
                        </select>

                        @if($errors->has('experience'))
                        <div class="error" style="color: red;">{{$errors->first('experience')}}</div>
                        @endif

                        </div>


                        
                            <div class="form-group">
                            <label for="">Recent Company Name</label>
                            <input type="text" class="form-control" name="company" value="{{Auth::user()->profile->company}}">
                            @if($errors->has('company'))
                            <div class="error" style="color: red;">{{$errors->first('company')}}</div>
                            @endif
                            </div>

                       
                            <div class="form-group">
                            <label for="">Designation in the last company</label>
                            <input type="text" class="form-control" name="designation" value="{{Auth::user()->profile->designation}}">
                            @if($errors->has('designation'))
                            <div class="error" style="color: red;">{{$errors->first('designation')}}</div>
                            @endif
                        </div>

                        <!--Needs dropdown list of states-->
                        
                            <div class="form-group">
                            <label for="">Preferred Location</label>
                            <input type="text" class="form-control" name="p_location" value="{{Auth::user()->profile->p_location}}">
                            @if($errors->has('p_location'))
                            <div class="error" style="color: red;">{{$errors->first('p_location')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="type">Salary Expected (per month in INR):</label>
                            <select class="form-control" name="salary">
                                <option value="5000-10000">5000-10000</option>
                                <option value="10001-15000">10001-15000</option>
                                <option value="15001-20000">15001-20000</option>
                                <option value="20001-30000">20001-30000</option>
                                <option value="30001-40000">30001-40000</option>
                                <option value="40001-50000">40001-50000</option>
                                <option value="50001-60000">50001-60000</option>
                                <option value="60001-70000">60001-70000</option>
                                <option value="70001-80000">70001-80000</option>
                                <option value="80001-90000">80001-90000</option>
                                <option value="90001-100000">90001-100000</option>
                               <option value="100000 plus">100000 plus</option>
                            </select>
                        </div>

                    <div class="form-group">
                        <label for="">Bio</label>
                        <textarea name="bio" class="form-control" rows="6" cols="80" style="width:100">{{Auth::user()->profile->bio}}</textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Edit & Update</button>
                    </div>
                </div>
        
            </form>

        </div>

        <div class="card mb-0">
            <div class="card-header">
                <a class="card-title">
                   <h5 class="d-inline-block h5 text-success font-weight-bold mb-0">Skills</h5>
                   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editskills{{$user->id}}">
                    Edit
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addskills{{$user->id}}">
                        Add Skills
                       </button>
                </a>
            </div>
            <div class="card-body">
              @foreach($user->skills as $skill)
               <button type="button" class="btn btn-sm btn-info mt-1">{{$skill->skill}}</button>
              @endforeach

            </div>

            <!-- Edit Skills Modal -->
            <div class="modal fade" id="editskills{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <form action="/profile/skills/edit" method="post">@csrf
                 <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Edit Skills</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div class="modal-body editskillsbody">
                          <select class="form-control selectedskills" multiple="multiple" placeholder="Select State" name="skills[]">
                             <option></option>
                             @foreach($skills as $skill)
                               <option value="{{$skill->id}}">{{$skill->skill}}</option>
                             @endforeach
                         </select>
               
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Save changes</button>
                           </div>
                       </div>
                   </div>
                   </form>	
                   </div>

            <!-- Add Skills Modal -->
            <div id="addskills{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <form action="/profile/skills/store" method="post">@csrf
                 <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add Skills</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div id="myModalABCD" class="modal-body addskillsbody">
                         
                           <div class="form-group col-xs-12">
                                                                 
                               <select class="form-control select2" multiple="multiple" placeholder="Select Skill" name="skills[]">
                                 <option></option>
                                 @foreach($skills as $skill)
                                   <option value="{{$skill->id}}">{{$skill->skill}}</option>
                                 @endforeach
                               </select>
                           </div>
               
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Save changes</button>
                           </div>
                       </div>
                   </div>
                   </form>	
                   </div>
        </div>
</div>


        <div class="col-md-4">
            <div class="card">
                <div class="card-header">About me</div>
                <div class="card-body">
                <p><strong>Name:</strong> &nbsp; &nbsp; {{Auth::user()->name}}</p>
                <p><strong>Email:</strong> &nbsp; &nbsp; {{Auth::user()->email}}</p>
                <p><strong>Current Location:</strong> &nbsp; &nbsp; {{Auth::user()->profile->location}}</p>
                <p><strong>Address:</strong> &nbsp; &nbsp; {{Auth::user()->profile->address}}</p>
                <p><strong>Phone:</strong> &nbsp; &nbsp; {{Auth::user()->profile->phone_number}}</p>
                <p><strong>Gender:</strong> &nbsp; &nbsp; {{Auth::user()->profile->gender}}</p>
                <p><strong>Previous Job Department:</strong><br>{{Auth::user()->profile->job_dept}}</p>
                <p><strong>Experience:</strong> &nbsp; &nbsp; {{Auth::user()->profile->experience}} &nbsp; year(s)</p>
                <p><strong>Previous Company:</strong><br>{{Auth::user()->profile->company}}</p>
                <p><strong>Previous Designation:</strong><br>{{Auth::user()->profile->designation}}</p>
                <p><strong>Preferred Location:</strong><br>{{Auth::user()->profile->p_location}}</p>
                <p><strong>Salary Expected:</strong><br>{{Auth::user()->profile->salary}}</p>
                <p><strong>Bio:</strong> &nbsp; &nbsp; {{Auth::user()->profile->bio}}</p>
                <p><strong>Member since:</strong> &nbsp; &nbsp; {{date('F d Y',strtotime(Auth::user()->created_at))}}</p>

                @if(!empty(Auth::user()->profile->cover_letter))
                    <p><a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Cover letter</a></p>
                @else
                    <p>Please upload cover letter</p>
                @endif


                @if(!empty(Auth::user()->profile->resume))
                    <p><a href="{{Storage::url(Auth::user()->profile->resume)}}">Resume</a></p>
                @else
                    <p>Please upload resume</p>
                @endif

                </div>
            </div>
            <br>
            <form action="{{route('cover.letter')}}" method="POST" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">Update coverletter</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="cover_letter">
                    <br>
                    <button class="btn btn-success float-right" type="submit">Update</button>
                @if($errors->has('cover_letter'))
                    <div class="error" style="color: red;">{{$errors->first('cover_letter')}}</div>
                @endif
                
                
                </div>
            </div>
            </form>

            <br>
            <form action="{{route('resume')}}" method="POST" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">Update Resume</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="resume">
                    <br>
                    <button class="btn btn-success float-right" type="submit">Update</button>
                
                @if($errors->has('resume'))
                    <div class="error" style="color: red;">{{$errors->first('resume')}}</div>
                @endif
                
                </div>
            </div>
            </form>


        </div></div>
        </div>

        <br>
        <br>
 
@endsection

@section('jsplugins')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
 
<script type="text/javascript">

    $(document).ready(function(){

        $('.select2').css('width','100%');
        $('.select2').select2({
          //width: 'resolve', 
          placeholder: "Please select Skills",
          allowClear: true,

        });

        $('.selectedskills').select2().val({{ json_encode($user->skills()->allRelatedIds()) }}).trigger('change');
    });
    </script>
@endsection

                    <!--   
                        
                            <input name="days" list="days">
                                <datalist id="days">
                                <option value="Sunday">
                                <option value="Monday">
                                <option value="Tuesday">
                                <option value="Wednesday">
                                <option value="Thursday">
                                <option value="Friday">
                                <option value="Saturday"> 
                                </datalist>

                                <input list="job_dept">

                                <datalist id="job_dept">
                                <option value="Internet Explorer">
                                <option value="Firefox">
                                <option value="Chrome">
                                <option value="Opera">
                                <option value="Safari">
                                </datalist>

                                <input list="cars" value="BMW" class="form-control" name="caBrands" style="width:300px;">
                                    <datalist id="cars">
                                    <option value="BMW">
                                    <option value="Toyota">
                                    <option value="Mitsubishi">
                                -->

                                

                    {{--<div class="form-group">
                        <label for="">Experience Details</label>
                        <textarea name="experience" class="form-control"> {{Auth::user()->profile->experience}} </textarea>
                        @if($errors->has('experience'))
                            <div class="error" style="color: red;">{{$errors->first('experience')}}</div>
                        @endif
                    </div>--}}
                   

                    {{--<div class="form-group">
                        <label for="job_dept">Previous Job Department</label>
                        <input class="form-control" value="{{Auth::user()->profile->job_dept}}" name="job_dept" list="job_dept">
                            <datalist id="job_dept">
                                
                    <div class="form-group">
                    <label for="type">Type:</label>
                    <select class="form-control" name="type">
                        <option value="fulltime"{{$job->type=='fulltime'?'selected':''}}>fulltime</option>
                        <option value="partime"{{$job->type=='partime'?'selected':''}}>partime</option>
                        <option value="casual"{{$job->type=='casual'?'selected':''}}>casual</option>
                    </select>
                    </div>--}}
                   
                    {{--@for ($i = 0; $i < 10; $i++)
                    The current value is {{ $i }}
                    @endfor--}}
