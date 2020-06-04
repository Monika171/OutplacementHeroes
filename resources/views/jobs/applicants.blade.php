@extends('layouts.main')

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


<div class="container">
    <!--<h1>Applicants</h1>-->
    <div class="row justify-content-center">
        <div class="col-md-12">       
          @foreach($applicants as $applicant)

            <div class="card">
                <div class="card-header"><a href="{{route('jobs.show',[$applicant->id,$applicant->slug])}}"> {{$applicant->title}}</a></div>

                <div class="card-body">
                    @foreach($applicant->users as $user)
                       
            <table class="table" style="width: 100%;">
            <thead class="thead-dark">
            </thead>
            <tbody>
            <tr>
                <td>
                    @if($user->profile->profile_pic)
                        <img src="{{asset('uploads/profile_pic')}}/{{$user->profile->profile_pic}}" width="80">
                        
                    @else
                    <img src="{{asset('profile_pic/man.jpg')}}" width="80">
                    
                    @endif

            <br>Applied on:{{ date('F d, Y', strtotime($applicant->created_at)) }}
                </td>
              <td>Name:{{$user->name}}</td>
      <td>Email{{$user->email}}</td>
      <td>City:{{$user->profile->city}}</td>
      <td>Gender{{$user->profile->gender}}</td>
      <td>Experience:{{$user->profile->experience}}</td>
      <td>Bio:{{$user->profile->bio}}</td>
      <td>Phone:{{$user->profile->phone_number}}</td>

      <td><a href="{{Storage::url($user->profile->resume)}}">Resume</a></td>

      <td>Cover letter</td>
      <td></td>

    </tr>
    
  </tbody>
</table>

                   </div><br><br>
                    @endforeach
                </div> 
                <br>
                 @endforeach


            </div>

        </div>
    </div>
</div>
@endsection