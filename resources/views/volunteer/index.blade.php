@extends('layouts.main')
@section('content')

<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1 style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Edit Profile Information</h1>
              </div>
          </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row">

        <div class="col-md-1">
        
        </div>

        <div class="col-md-7">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            
            @endif
            
            <div class="card">
                <div class="card-header">Update Profile</div>
                <form action="{{route('volunteer.store')}}" method="POST">@csrf


                <!--location needs dropdown list to choose from-->
                <div class="card-body">

                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" class="form-control" name="phone" value="{{Auth::user()->vprofile->phone}}">
                        @if($errors->has('phone'))
                            <div class="error" style="color: red;">{{$errors->first('phone')}}</div>
                        @endif
                                      
                    </div>

                    <div class="form-group">
                        <label for="">Current Location</label>
                        <input type="text" class="form-control" name="location" value="{{Auth::user()->vprofile->location}}">
                        @if($errors->has('location'))
                        <div class="error" style="color: red;">{{$errors->first('location')}}</div>
                        @endif
                    </div>


                        <div class="form-group">
                            <label for="industry">Industry </label>
                            <input class="form-control"  value="{{Auth::user()->vprofile->industry}}" name="industry" list="industry">
                                <datalist id="industry">
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
                                @if($errors->has('industry'))
                                <div class="error" style="color: red;">{{$errors->first('industry')}}</div>
                               @endif
                            
                        </div>


                    {{--<div class="form-group">
                        <label for="">Bio</label>
                        <textarea name="bio" class="form-control" rows="6" cols="80" style="width:100">{{Auth::user()->profile->bio}}</textarea>
                    </div>--}}

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Edit & Update</button>
                    </div>
                </div>
        
            </form>

        </div>
</div>


        <div class="col-md-4">
            <div class="card">
                <div class="card-header">About me</div>
                <div class="card-body">
                <p><strong>Name:</strong> &nbsp; &nbsp; {{Auth::user()->name}}</p>
                <p><strong>Email:</strong> &nbsp; &nbsp; {{Auth::user()->email}}</p>
                <p><strong>Phone:</strong> &nbsp; &nbsp; {{Auth::user()->vprofile->phone}}</p>
                <p><strong>Current Location:</strong> &nbsp; &nbsp; {{Auth::user()->vprofile->location}}</p>
                <p><strong>Industry:</strong><br>{{Auth::user()->vprofile->industry}}</p>
               
                </div>
            </div>
            <br>
        </div>
 


    </div>
</div>
        

        <br>
        <br>
 
@endsection

