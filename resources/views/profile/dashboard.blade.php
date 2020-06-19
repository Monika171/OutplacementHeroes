@extends('layouts.main')

@section('content')

{{--<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Welcome {{Auth::user()->name}}</h1>
              </div>
          </div>
    </div>
</div>--}}

<div class="hero-wrap" style="height: 300px; background:#038cfc">
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    Welcome {{Auth::user()->name}}</h1>
              </div>
          </div>
    </div>
</div>

<section class="ftco-section bg-light">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-dark font-weight-bold text-center">Saved jobs</h2>

            @if(count($jobs)>0)
            @foreach($jobs as $job)
            <div class="card">
                <div class="card-header">{{$job->title}}</div>
                

                <div class="card-body">  
                    <small class="badge badge-success">{{$job->position}}
                </small>

                   <p> {{$job->description}}</p>
                </div>
                <div class="card-footer">
                    <span><a href="{{route('jobs.show',[$job->id,$job->slug])}}">Read</a></span>
                    <span class="float-right">Last date:{{$job->last_date}}</span>
                </div>

            </div>
            <br>
            @endforeach

            @else

            <div class="col-md-12 text-center ftco-animate">
                <!--<span class="subheading">Registered Candidates</span>-->
                <h6 class="mt-5 mb-0">Oops! There are no saved job posts or the same must have expired. </h6>                
            </div>
                       
            @endif


        </div>
    </div>
    {{--<div class="row justify-content-center">
        <div class="col-md-12 my-5">
            <div class="card">
                <div class="card-header">Applied jobs</div>

                <div class="card-body">
                    
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>      
                            <th scope="col">Position</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Experience</th>
                            <th scope="col">City</th>
                            <th scope="col">Vacancy</th>
                            <th scope="col">Notice Period</th>
                            <th scope="col">Last Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created at</th>
                            <th scope="col"></th>
                            
                          </tr>
                        </thead>
                        <tbody>
                        
                         @foreach($jobs as $job)
                         
                          <tr>
                            <th scope="row">
                                {{$job->title}}
                            </th>                             
                            <td>{{$job->position}}
                            <br>
                            <i class="fa fa-hourglass-half" aria-hidden="true"></i></i>&nbsp;{{$job->type}}
                            </td>
                            <td>{{$job->salary}}</td>
                            <td>{{$job->experience}} year(s)</td>
                            <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;{{$job->city}}</td>
                            <td>{{$job->number_of_vacancy}}</td>
                            <td>{{$job->notice_period}}</td>
                            <td>{{$job->last_date}}</td>
                            <td>{{$job->status}}</td>
                            <td>{{$job->created_at->diffForHumans()}}</td>
                            <td>
                            <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                            <button class="btn btn-success btn-sm">     View
                            </button>
                            </a>
                            </td>
                          
                          </tr> 
                        @endforeach	
                        </tbody>
                      </table>


                </div>
            </div>
        </div>
    </div>--}}
</div>
</section> 
@endsection