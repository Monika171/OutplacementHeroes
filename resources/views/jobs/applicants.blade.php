@extends('layouts.main')

@section('select2css')
<style>

    .im{display:inline-block;
        margin-top:10px;
        margin-left:5px;
        margin-right:5px;
        width: 100px;
        height: 100px;
        border-radius: (50%);
        position: relative;
    }

</style>
@endsection


@section('content')

<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Applicants</h1>
              </div>
          </div>
    </div>
</div>
   
<section class="ftco-section bg-light">
	<div class="container">
				{{--<div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <!--<span class="subheading">Registered Candidates</span>-->
                    <h2 class="mb-4"><span>All</span> Applicants</h2>
                </div>
                </div>--}}
		
		<div class="row">
		<div class="col-md-12 ftco-animate">
        @if(count($applicants)>0)
		@foreach($applicants as $applicant)
		
		<div class="card">
		     <div class="card-header"><a href="{{route('jobs.show',[$applicant->id,$applicant->slug])}}"> {{$applicant->title}}</a></div>

                <div class="card-body">
		
		
            @if(count($applicant->users)>0)
			@foreach($applicant->users as $user)
          
            <div class="ftco-animate"> 
				<div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                       
                            <div class="col-4 col-md-3">
                            <div class="d-flex">
                            
                                @if(empty($user->profile->profile_pic))
                                
                                    <img src="{{asset('profile_pic/man.jpg')}}" class="im">
                                    
                                    @else
                                    
                                    <img src="{{asset('uploads/profile_pic')}}/{{$user->profile->profile_pic}}"  class="im">
                                    
                                    @endif
                            
                            </div>
                            </div>
                            <div class="col-8 col-md-7">
                                <div class="mb-2 mb-md-0 mr-5">
                                    <div class="job-post-item-header d-flex align-items-center">
                                    <h4 class="mr-3 text-black">Name: {{$user->name}}</h4>
                                    </div>
                                
                                    <div class="job-post-item-body d-block d-md-flex">
                                        <div class="mr-3"><p>Email: {{$user->email}}<br>
                                        <div class="mr-3"><span class="icon-layers"></span>
                                            Total Experience:&nbsp;&nbsp;{{$user->profile->experience_years}}year(s)</a>
                                            <br>Notice Period:&nbsp;&nbsp;{{$user->profile->notice_period}}<br>
                                        <span class="icon-my_location"></span> <span>{{$user->profile->state}}</span></div>
                                        </div>
                                    </div>
                                
                                    {{--
									
									>Applied on:{{ date('F d, Y', strtotime($applicant->created_at)) }}
                                    </td>
                                    <td>Name:{{$user->name}}</td>
                                    <td>Email{{$user->email}}</td>
                                    <td>City:{{$user->profile->city}}</td>
                                    <td>Gender{{$user->profile->gender}}</td>
                                    <td>Experience:{{$user->profile->experience}}</td>
                                    <td>Bio:{{$user->profile->bio}}</td>
                                    <td>Phone:{{$user->profile->phone_number}}</td>

                                    <td><a href="{{Storage::url($user->profile->resume)}}">Resume</a></td>

                                    <div class="job-post-item-body d-block d-md-flex">
                                    <div class="mr-3"><span class="icon-layers"></span> <a href="#">{{$user->profile->experience}}</a></div>
                                    <div><span class="icon-my_location"></span> <span>{{$user->profile->city}}</span></div>
                                    </div>--}}
                                </div>
                            </div>
                    
                            <div class="col-6 col-md-2">
                            <div class="ml-auto d-flex">
                            <a href="{{route('seeker.show',[$user->id])}}" class="btn btn-info btn-sm active"  role="button" aria-pressed="true">View</a>
                                </div>
                            </div>
			  
			  
                </div>
            </div>
         
          @endforeach
          @else
          No Applications yet.
          @endif
        </div>
		  <!-- end -->
		  
		  </div> 
		  <br>
            @endforeach
            @else
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <!--<span class="subheading">Registered Candidates</span>-->
                    <h2 class="mb-4"><span>No</span> &nbsp; applications<span>  &nbsp; yet..</span> </h2>
                </div>
            </div>
            @endif
                </div>


            </div>       
			</div>
		</section>
		
@endsection



    