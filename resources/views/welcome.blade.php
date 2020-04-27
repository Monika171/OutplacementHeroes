@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Recent Openings</h1>
        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($jobs as $job)
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
