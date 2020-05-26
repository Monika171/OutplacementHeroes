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
            <div class="col-md-3 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">
            </div>
        </div>
  </div>
</div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          
            <div class="col-md-4  px-4 sidebar ftco-animate">
                
                    <div class="blog-entry align-self-stretch">
                         @if(empty($user->profile->profile_pic))
                        <img  class="block-20" src="{{asset('profile_pic/man.jpg')}}">
                        @else
                        <img  class="block-20" src="{{asset('uploads/profile_pic')}}/{{$user->profile->profile_pic}}">

                        @endif
                      
                        <div class="text mt-3">
                          
                        {{--<h3 class="heading">{{$user->name}}</h3>--}}
                        @if(!empty($user->profile->resume))
                            <p style="font-weight: bold; font-size: 18px;"><a href="{{Storage::url($user->profile->resume)}}">View Candidate Resume</a></p>
                        @endif

                        <h3 class="heading"><strong>Gender:</strong>&nbsp; &nbsp; {{$user->profile->gender}}</h3>
                        <h3 class="heading"><strong>Date of Birth:</strong> &nbsp; &nbsp; {{$user->profile->dob}}</h3>
                        <h3 class="heading"><strong>Email:</strong>&nbsp; &nbsp; {{$user->email}}</h3>
                        <h3 class="heading"><strong>Phone:</strong>&nbsp; &nbsp; {{$user->profile->phone_number}}</h3>
                        <h3 class="heading"><strong>Address:</strong></strong> &nbsp; &nbsp;</h3>
                        <p><h5 class="heading">{{$user->profile->address_line1}}
                        {{$user->profile->address_line2}},
                        {{$user->profile->city}},&nbsp;{{$user->profile->state}},
                        Pincode:&nbsp; {{$user->profile->pincode}}</h5></p>
                        <div class="meta mb-2">
                          <div>Member since: &nbsp; &nbsp; {{date('F d Y',strtotime($user->created_at))}}</div> 
                        
                      </div>

                        <div class="card mr-4">
                          <div class="card-header">
                              <a class="card-title">
                                 <h5 class="d-inline-block h5 text-dark font-weight-bold mb-0">Skills</h5>
                              </a>
                          </div>
                          <div class="card-body">
                            @foreach($user->skills as $skill)
                             <button type="button" class="btn btn-sm btn-info mt-1">{{$skill->skill}}</button>
                            @endforeach
              
                          </div>
                        </div>
                      
                    </div>
                    </div>
                  
            </div>

        <div class="col-md-8 px-4 ftco-animate">
        {{--<h2 class="mb-3">Name:&nbsp; &nbsp;{{$user->name}}</h2>
        <hr>--}}
        
        <h5 class="mb-2 mt-2">Overall Experience:</h5>
        <p>{{$user->profile->experience_years}}&nbsp; year(s)
          &nbsp; &nbsp; {{$user->profile->experience_months}} &nbsp; months(s)</p>

        @if(!empty($user->profile->recent_company))
        <h5 class="mb-2 mt-2">Company (Recent/Current):</h5>
        <p>{{$user->profile->recent_company}}</p>
        @endif

        @if(!empty($user->profile->recent_designation))
        <h5 class="mb-2 mt-2">Designation (Recent/Current):</h5>
        <p>{{$user->profile->recent_designation}}</p>
        @endif

        @if(!empty($user->profile->start_date))
        <div class="row">
        <div class="col-md-6">

        <h5 class="mb-2 mt-2">Start Date:</h5>
        <p>{{$user->profile->start_date}}</p>

        </div>
        <div class="col-md-6">
        
        <h5 class="mb-2 mt-2"> End Date:</h5>
        <p>{{$user->profile->end_date}}</p>

        </div>
        </div>
        @endif

        {{--<h5 class="mb-2 mt-2">Current Function:</h5>
        <p>{{$user->profile->function}}</p>--}}
        
        @if(!empty($user->profile->industry))
        <h5 class="mb-2 mt-2">Industry (Recent/Current):</h5>
        <p>{{$user->profile->industry}}</p>
        @endif

        @if(!empty($user->profile->salary_in_lakhs)&&!empty($user->profile->salary_in_thousands))
        <h5 class="mb-2 mt-2">Recent/Current CTC (in INR):</h5>
        <p>{{$user->profile->salary_in_lakhs}}&nbsp;Lakh(s)
          &nbsp;&nbsp;{{$user->profile->salary_in_thousands}}&nbsp; Thousand(s)</p>
        @endif

        <hr>
        @if(!empty($user->profile->expected_ctc))
        <h5 class="mb-2 mt-2">Expected CTC:</h5>
        <p>{{$user->profile->expected_ctc}}&nbsp;Lakh(s)</p>
        @endif

        @if(!empty($user->profile->preferred_location))
        <h5 class="mb-2 mt-2">Preferred Location:</h5>
        <p>{{$user->profile->preferred_location}}</p>
        @endif

        <h5 class="mb-2 mt-2">Notice Period:</h5>
        <p>{{$user->profile->notice_period}}</p>


 
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

