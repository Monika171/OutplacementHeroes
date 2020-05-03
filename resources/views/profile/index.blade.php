@extends('layouts.app')

@section('content')
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

                <div class="card-body">
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

                    <div class="form-group">
                        <label for="job_dept">Previous Job Department</label>
                        <input class="form-control" name="job_dept" list="job_dept">
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
                    -->

                    <div class="form-group">
                        <label for="">Experience Details</label>
                        <textarea name="experience" class="form-control"> {{Auth::user()->profile->experience}} </textarea>
                        @if($errors->has('experience'))
                            <div class="error" style="color: red;">{{$errors->first('experience')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Bio</label>
                        <textarea name="bio" class="form-control">{{Auth::user()->profile->bio}}</textarea>
                        @if($errors->has('bio'))
                        <div class="error" style="color: red;">{{$errors->first('bio')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Edit & Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">About me</div>
                <div class="card-body">
                <p><strong>Name:</strong> &nbsp; &nbsp; {{Auth::user()->name}}</p>
                <p><strong>Email:</strong> &nbsp; &nbsp; {{Auth::user()->email}}</p>
                <p><strong>Address:</strong> &nbsp; &nbsp; {{Auth::user()->profile->address}}</p>
                <p><strong>Phone:</strong> &nbsp; &nbsp; {{Auth::user()->profile->phone_number}}</p>
                <p><strong>Gender:</strong> &nbsp; &nbsp; {{Auth::user()->profile->gender}}</p>
                <p><strong>Previous Job Department:</strong><br>{{Auth::user()->job_dept}}</p>
                <p><strong>Experience:</strong> &nbsp; &nbsp; {{Auth::user()->profile->experience}}</p>
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



        </div>
    </div>
</div>
@endsection
