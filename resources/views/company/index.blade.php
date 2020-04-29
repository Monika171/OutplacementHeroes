@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">

            @if(empty(Auth::user()->company->cover_photo))  
            <img src="{{asset('cover/work.jpg')}}" style="width:100%;"> 
            
            @else
            <img src="{{asset('uploads/coverphoto')}}/{{Auth::user()->company->cover_photo}}" style="width: 100%;">
                    
            @endif

            <div class="company-desc">
                <div class="row justify-content-center">
                <img src="{{asset('profile_pic/logo.jpg')}}" style="width:20%;">
                </div>
                <p>{{$company->description}}</p>
                <h1>{{$company->cname}}</h1>
                <p>Slogan-{{$company->slogan}}&nbsp;
                Address-{{$company->address}}&nbsp;
                Phone-{{$company->phone}}&nbsp;
                Website-{{$company->website}}</p>
            </div>
    
        </div>

        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($company->jobs as $job)
                <tr>
                    <td><img src="{{asset('profile_pic/logo.jpg')}}" width=30%></td>
                    <td>Position: {{$job->position}}</td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; Address:{{$job->address}}</td>
                    <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;{{$job->created_at->diffForHumans()}}</td>
                    
                    
                    <td>
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                        <button class="btn btn-success btn-sm">Apply</button>
                        </a>
                    </td>
                
                </tr>
                @endforeach

            </tbody>
        </table>


    </div>      
</div>
@endsection
