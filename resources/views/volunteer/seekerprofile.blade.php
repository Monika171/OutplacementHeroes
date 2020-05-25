@extends('layouts.main')
@section('content')

<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
  <!--<div class="overlay"></div>-->
  <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="{{route('company')}}">Companies <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                <h1 style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Candidate Name: {{$user->name}}</h1>
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
                        <h3 class="heading">Gender:&nbsp; &nbsp; {{$user->profile->gender}}</h3>
                        <h3 class="heading">Date of Birth: &nbsp; &nbsp; {{$user->profile->dob}}</h3>
                        <h3 class="heading">Email:&nbsp; &nbsp; {{$user->email}}</h3>
                        <h3 class="heading">Phone:&nbsp; &nbsp; {{$user->profile->phone_number}}</h3>
                        <h3 class="heading">Address:</strong> &nbsp; &nbsp; {{$user->profile->address_line1}}</h3>
                        <h3 class="heading">{{$user->profile->address_line2}}</h3>
                        <h3 class="heading">{{$user->profile->city_id}},&nbsp; &nbsp;{{$user->profile->state_id}}</h3>
                        <h3 class="heading">Pincode:&nbsp; &nbsp; {{$user->profile->pincode}}</h3>
                      
                    </div>
                    </div>
                  
            </div>


            <div class="col-md-8 ftco-animate">
              <h2 class="mb-3">{{$user->name}}</h2>
              
              <h4 class="mb-3 mt-5">Experience:<h4>
              <p>{{$user->profile->experience_years}}&nbsp; year(s)
                &nbsp; &nbsp; {{$user->profile->experience_months}} &nbsp; months(s)</p>
      
              <h4 class="mb-3 mt-4">Current/Previous Company:</h4>
              <p>{{$user->profile->recent_company}}</p>
      
              <h4 class="mb-3 mt-4">Current/Previous Designation:</h4>
              <p>{{$user->profile->recent_designation}}</p>
      
              <h4 class="mb-3 mt-4">Start Date:</h4>
              <p>{{$user->profile->start_date}}</p>
              
              <h4 class="mb-3 mt-5"> End Date:</h4>
              <p>{{$user->profile->end_date}}</p>
      
              <h4 class="mb-3 mt-4">Current Function:</h4>
              <p>{{$user->profile->function}}</p>
      
              <h4 class="mb-3 mt-4">Current Industry:</h4>
              <p>{{$user->profile->industry}}</p>
      
              <h4 class="mb-3 mt-4">Current CTC:</h4>
              <p>{{$user->profile->salary_in_lakhs}}&nbsp;Lakh(s)
                &nbsp;&nbsp;{{$user->profile->salary_in_thousands}}&nbsp; Thousand(s)</p>
      
              <h4 class="mb-3 mt-4">Expected CTC:</h4>
              <p>{{$user->profile->expected_ctc}}&nbsp;Lakh(s)</p>
      
              <h4 class="mb-3 mt-4">Preferred Location:</h4>
              <p>{{$user->profile->preferred_location}}</p>
      

 
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

