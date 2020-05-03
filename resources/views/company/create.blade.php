@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3">
            @if(empty(Auth::user()->company->logo))

                    <img src="{{asset('profile_pic/logo.jpg')}}"style="width: 100%;">

            @else
                <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" style="width: 100%;">
            @endif
        <br><br>
        <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">Update logo</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="company_logo"><br>
                    <button class="btn btn-dark float-right" type="submit">Update</button>
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
                <div class="card-header">Update Company Information</div>
                <form action="{{route('company.store')}}" method="POST">@csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{Auth::user()->company->address}}">
                        @if($errors->has('address'))
                        <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                    @endif
                   
                   
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone"  value="{{Auth::user()->company->phone}}" >
                    
                        @if($errors->has('phone'))
                        <div class="error" style="color: red;">{{$errors->first('phone')}}</div>
                    @endif
                    
                    
                    </div>
                    <div class="form-group">
                        <label for="">Website</label>
                        <input type="text" class="form-control" name="website"  value="{{Auth::user()->company->website}}">
                    
                        @if($errors->has('website'))
                        <div class="error" style="color: red;">{{$errors->first('website')}}</div>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="">Slogan</label>
                        <input type="text" class="form-control" name="slogan"  value="{{Auth::user()->company->slogan}}">
                        @if($errors->has('slogan'))
                        <div class="error" style="color: red;">{{$errors->first('slogan')}}</div>
                    @endif
                    
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control"> {{Auth::user()->company->description}}</textarea>
                        @if($errors->has('description'))
                        <div class="error" style="color: red;">{{$errors->first('description')}}</div>
                    @endif
                    
                    
                    </div>
                                 
                    <div class="form-group">
                        <label for="job_dept">Select Recruitment Category </label>
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

                    <div class="form-group">
                        <button class="btn btn-dark" type="submit">Edit & Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">About Company</div>
                <div class="card-body">
                    <p><strong>Name:</strong> &nbsp; &nbsp;{{Auth::user()->company->cname}}</p>
                    <p><strong>Address:</strong> &nbsp; &nbsp; {{Auth::user()->company->address}}</p>

                    <p><strong>Phone:</strong> &nbsp; &nbsp; {{Auth::user()->company->phone}}</p>

                    <p><strong>Currently Recruiting for:</strong> &nbsp; &nbsp; </strong><br> {{Auth::user()->job_dept}} Job Position</p>

                    <p><strong>Website:</strong> &nbsp; &nbsp; <a href="{{Auth::user()->company->website}}"> {{Auth::user()->company->website}}</a></p>
                    <p><strong>Company page:</strong> &nbsp; &nbsp;<a href="company/{{Auth::user()->company->slug}}">View</a></p>
                    <p><strong>Our slogan:</strong> &nbsp; &nbsp; {{Auth::user()->company->website}}</p>
                   

                    
             

                </div>
            </div>
            <br>
            <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">@csrf
                <div class="card">
                    <div class="card-header">Update cover photo</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="cover_photo"><br>
                        <button class="btn btn-dark float-right" type="submit">Update</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection
