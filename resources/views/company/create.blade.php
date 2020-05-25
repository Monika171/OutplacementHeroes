@extends('layouts.main')
@section('content')

<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Edit Company Information</h1>
              </div>
          </div>
    </div>
</div>
<br>
<br>
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
                    <button class="btn btn-dark  btn-sm float-right" type="submit">Update</button>
                    @if($errors->has('company_logo'))
                    <div class="error" style="color: red;">{{$errors->first('company_logo')}}</div>
                    @endif
                </div>
            </div>
        </form>

        <br>
        <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">Update cover photo</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="cover_photo"><br>
                    <button class="btn btn-dark  btn-sm float-right" type="submit">Update</button>
                    @if($errors->has('cover_photo'))
                    <div class="error" style="color: red;">{{$errors->first('cover_photo')}}</div>
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
            <div class="card-header">Update Company Information</div>
            <form action="{{route('company.store')}}" method="POST">@csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{Auth::user()->company->address?Auth::user()->company->address:old("address")}}">
                        @if($errors->has('address'))
                        <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                    @endif
                   
                   
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone"  value="{{Auth::user()->company->phone?Auth::user()->company->phone:old("phone")}}" >
                    
                        @if($errors->has('phone'))
                        <div class="error" style="color: red;">{{$errors->first('phone')}}</div>
                    @endif
                    
                    
                    </div>
                    <div class="form-group">
                        <label for="">Website</label>
                        <input type="text" class="form-control" name="website"  value="{{Auth::user()->company->website?Auth::user()->company->website:old("website")}}">
                    
                        @if($errors->has('website'))
                        <div class="error" style="color: red;">{{$errors->first('website')}}</div>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="">Slogan</label>
                        <input type="text" class="form-control" name="slogan"  value="{{Auth::user()->company->slogan?Auth::user()->company->slogan:old("slogan")}}">
                        @if($errors->has('slogan'))
                        <div class="error" style="color: red;">{{$errors->first('slogan')}}</div>
                    @endif
                    
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="6" cols="80" style="width:100"> {{Auth::user()->company->description?Auth::user()->company->description:old("description")}}</textarea>
                        @if($errors->has('description'))
                        <div class="error" style="color: red;">{{$errors->first('description')}}</div>
                    @endif
                    
                    
                    </div>
                                 
                    <div class="form-group">
                        <label for="industry">Industry </label>
                        <input class="form-control"  value="{{Auth::user()->company->industry?Auth::user()->company->industry:old("industry")}}" name="industry" list="industry">
                            <datalist id="industry">
                                @foreach($industry as $ind)
                                <option value="{{$ind}}">
                                @endforeach
                            </datalist>
                            @if($errors->has('industry'))
                            <div class="error" style="color: red;">{{$errors->first('industry')}}</div>
                           @endif
                        
                    </div>

                    <div class="form-group">
                        <button class="btn btn-dark" type="submit">Edit & Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">About Company(preview)</div>
                <div class="card-body">
                    <p><strong>Company Name:</strong> &nbsp; &nbsp;{{Auth::user()->company->cname}}</p>
                    <p><strong>Address:</strong> &nbsp; &nbsp; {{Auth::user()->company->address}}</p>
                    <p><strong>Email:</strong> &nbsp; &nbsp; {{Auth::user()->email}}</p>
                    <p><strong>Authority Name:</strong> &nbsp; &nbsp; {{Auth::user()->name}}</p>
                    <p><strong>Phone:</strong> &nbsp; &nbsp; {{Auth::user()->company->phone}}</p>

                    {{--<p><strong>Currently Recruiting for:</strong> &nbsp; &nbsp; </strong><br> {{Auth::user()->job_dept}} Job Position</p>--}}
                    <p><strong>Our slogan:</strong> &nbsp; &nbsp; {{Auth::user()->company->website}}</p>
                    <p><strong>Description:</strong> &nbsp; &nbsp; {{Auth::user()->company->description}}</p>
                    <p><strong>Industry:</strong><br>{{Auth::user()->company->industry}}</p>
                    <p><strong>Website:</strong> &nbsp; &nbsp; <a href="{{Auth::user()->company->website}}"> {{Auth::user()->company->website}}</a></p>
                    <p><strong>Company page:</strong> &nbsp; &nbsp;<a href="company/{{Auth::user()->company->slug}}">View</a></p>
                   

                    
             

                </div>
            </div>



        </div>
    </div>
</div>

<br>
<br>
@endsection
