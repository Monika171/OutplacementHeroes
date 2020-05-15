@extends('layouts.main')
@section('content')

<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
  <!--<div class="overlay"></div>-->
  <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="{{route('company')}}">Companies <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$user->name}}</h1>
            </div>
            <div class="col-md-3 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">
               @if(Auth::check()&&Auth::user()->id==$user->id)
                  {{--<a href="{{route('company.view')}}"><button class="btn btn-danger btn-lg">Edit</button></a>--}}

                  <a class="btn btn-warning btn-lg" href="{{route('user.profile')}}" role="button">Edit Details</a>

               @endif
            </div>
        </div>
  </div>
</div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          
            <div class="col-md-4 sidebar ftco-animate">
                
                    <div class="blog-entry align-self-stretch">
                         @if(empty($user->profile->profile_pic))
                        <img  class="block-20" src="{{asset('profile_pic/man.jpg')}}">
                        @else
                        <img  class="block-20" src="{{asset('uploads/profile_pic')}}/{{$user->profile->profile_pic}}">

                        @endif
                      
                        <div class="text mt-3">
                          <div class="meta mb-2">
                            <div>Member since: &nbsp; &nbsp; {{date('F d Y',strtotime($user->created_at))}}</div> 
                          
                        </div>
                        {{--<h3 class="heading">{{$user->name}}</h3>--}}
                        <h3 class="heading">Gender:</strong> &nbsp; &nbsp; {{$user->profile->gender}}</h3>
                        <h3 class="heading">Email:</strong> &nbsp; &nbsp; {{$user->email}}</h3>
                        <h3 class="heading">Phone:</strong> &nbsp; &nbsp; {{$user->profile->phone_number}}</h3>
                        <h3 class="heading">Address:</strong> &nbsp; &nbsp; {{$user->profile->address}}</h3>
                      
                    </div>
                    </div>
                  
            </div>

    <div class="col-md-8 ftco-animate">
        <h2 class="mb-3">{{$user->name}}</h2>
        <p>{{$user->profile->bio}}</p>
        <h4 class="mb-3 mt-5">Previous Job Department:</h4>
        <p>{{$user->profile->job_dept}}</p>

        <h4 class="mb-3 mt-4">Experience:</h4>
        <p>{{$user->profile->experience}}</p>

        <h4 class="mb-3 mt-4">Previous Company:</h4>
        <p>{{$user->profile->company}}</p>

        <h4 class="mb-3 mt-4">Previous Designation:</h4>
        <p>{{$user->profile->designation}}</p>

        <h4 class="mb-3 mt-4">Preferred Location:</h4>
        <p>{{$user->profile->p_location}}</p>

        <h4 class="mb-3 mt-4">Salary Expected:</h4>
        <p>{{$user->profile->salary}}</p>

 
        <!--
        <div class="tag-widget post-tag-container mb-5 mt-5">
          <div class="tagcloud">
            <a href="#" class="tag-cloud-link">Life</a>
            <a href="#" class="tag-cloud-link">Sport</a>
            <a href="#" class="tag-cloud-link">Tech</a>
            <a href="#" class="tag-cloud-link">Travel</a>
          </div>
        </div>-->

        </div>
      </div>
    </div>
</section>

