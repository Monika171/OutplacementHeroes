@extends('layouts.main')
@section('content')

<div class="hero-wrap" style="height: 300px; background: #038cfc;">
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    <u>Job Seekers</u></h1>
              </div>
          </div>
    </div>
</div>
   
<section class="ftco-section" style="background: linear-gradient(to bottom, #f7f7f7 90%, #c85482 123%);">
	<div class="container">
				<div class="row justify-content-center mb-1 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <!--<span class="subheading">Registered Candidates</span>-->
                    <h2><span>Registered</span> Job Seekers</h2>
                </div>
                </div>
		
		<div class="row">
            @if(count($seekers)>0)
			@foreach($seekers as $seeker)
          <div class="col-md-12 ftco-animate">
                   
					<div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                       
                            <div class="col-4 col-md-3 text-center">
                                <a href="{{route('seeker.show',[$seeker->user_id])}}"> 
                                <div class="d-flex">                                                               
                                    @if(empty($seeker->profile_pic))                                
                                        <img width="60%" src="{{asset('profile_pic/man.jpg')}}" class="img-fluid mx-auto">                                    
                                        @else                                    
                                        <img width="60%" src="{{asset('uploads/profile_pic')}}/{{$seeker->profile_pic}}"  class="img-fluid mx-auto">                                    
                                    @endif                                    
                                                              
                                </div>
                                <small class="text-muted"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Profile</small>
                            </a>
                            </div>
                            <div class="col-8 col-md-7">
                                <a href="{{route('seeker.show',[$seeker->user_id])}}"> 
                                <div class="mb-2 mb-md-0 mr-5">
                                    <div class="job-post-item-header d-flex align-items-center">
                                    
                                    <h4 class="mr-3 text-black"><u>{{$seeker->user->name}}</u></h4>
                                                                           
                                    </div>
                                    <div class="job-post-item-body d-block d-md-flex text-secondary">   
                                        <div class="mr-3"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;{{$seeker->user->email}}</div>                                        
                                        <div><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;{{$seeker->phone_number}}</div>
                                    </div>
                                    @if(!empty($seeker->industry))
                                    <div class="mx-0 text-secondary"><i class="fa fa-cubes" aria-hidden="true"></i>&nbsp;
                                        Recent Industry:&nbsp;{{$seeker->industry}}</div> 
                                    @endif
                                    @if(!empty($seeker->recent_designation))
                                    <div class="mx-0 text-secondary"><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;
                                        Recent Designation:&nbsp;{{$seeker->recent_designation}}</div>   
                                   @endif
                                    <div class="job-post-item-body d-block d-md-flex text-secondary">                                             
                                        <div class="mr-3"><i class="fa fa-briefcase" aria-hidden="true"></i>
                                            Total Experience:&nbsp;{{$seeker->experience_years}}year(s)</div> 
                                        <div><i class="fa fa-map-marker" aria-hidden="true"></i> {{$seeker->city}},&nbsp;{{$seeker->state}}</div>                                 
                                    </div>                                                                                                            
                                </div>
                            </a> 
                            </div>                           
                    
                            <div class="col-6 col-md-2">
                            <div class="ml-auto d-flex">
                            @if(!empty($seeker->resume))
                            <a href="{{Storage::url($seeker->resume)}}">
                                <button type="button" class="btn btn-outline-info btn-sm">
                                <strong><i class="fa fa-link" aria-hidden="true"></i>
                                    &nbsp;RESUME</strong></button>
                            </a>                           
                            @endif
                            </div>
                            </div>
                </div>	  
			  
			</div>
          
          @endforeach
          @else
          
          <div class="col-md-12 text-center ftco-animate">
            <!--<span class="subheading">Registered Candidates</span>-->
            <h6 class="mt-5 mb-0">Job Seekers Will Register Soon..</h6>
            <p class="mt-0 mb-5">Thank You. Have a Nice Day!</p>
          </div>
          @endif
        </div>
		  <!-- end -->
 
                
          <div class="row mt-5">
            <div class="col text-center">
                <div class="pagination center">                   
                            {{$seekers->links()}}                
                </div>
            </div>
          </div>
                  
			</div>
		</section>
		
@endsection

 {{--<p style="font-weight: bold; font-size: 18px;"><a href="{{Storage::url($seeker->resume)}}">View Candidate Resume</a></p>--}}                            
{{--<style>

    .im{display:inline-block;
        margin-top:10px;
        margin-left:5px;
        margin-right:5px;
        width: 100px;
        height: 100px;
        border-radius: (50%);
        position: relative;
    }

</style>--}}
    