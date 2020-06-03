@extends('layouts.main')

@section('content')

<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Jobs Posted By You</h1>
              </div>
          </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 my-5">
            <div class="card">
                <!--<div class="card-header">Your jobs</div>-->

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
                            <button class="btn btn-success btn-sm">     Read
                            </button>
                            </a>
                            <br><br>
                            <a href="{{route('job.edit',[$job->id])}}"> <button class="btn btn-primary btn-sm">Edit</button></a>

                            </td>
                          
                          </tr> 
                        @endforeach	
                        </tbody>
                      </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
