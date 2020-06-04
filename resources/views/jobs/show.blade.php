@extends('layouts.main')

@section('content')

<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$job->title}}</h1>
              </div>
          </div>
    </div>
</div>


<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>            
            @endif
            <div class="card">
                {{--<div class="card-header">{{$job->title}}</div>--}}

                <div class="card-body">
                    <p>
                        <h3>Description</h3>
                        {{$job->description}}
                    <p>
                    <p>
                        <h3>Roles </h3>{{$job->roles}}

                    </p>   
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Brief Info</div>

                <div class="card-body">
                    
                    <p>Company:<a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">{{$job->company->cname}}</a></p>
                        <p>City:{{$job->city}}</p>
                        <p>Position:{{$job->position}}</p>
                        <p>Posted:{{$job->created_at->diffForHumans()}}</p>
                        <p>Last date to apply:{{ date('F d, Y', strtotime($job->last_date)) }}</p>
                </div>
                
            </div>
            <br>
            @if(Auth::check()&&Auth::user()->user_type=='seeker')
            @if(!$job->checkApplication())
            <form action="{{route('apply',[$job->id])}}" method="POST">@csrf
            <button type="submit" class="btn btn-success btn-sm" style="width: 100%;">Apply</button>
            </form>
            @endif
            @endif
        </div>
        
    </div>
    
</div>
@endsection
