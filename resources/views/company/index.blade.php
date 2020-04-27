@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">
            <img src="{{asset('cover/work.jpg')}}" style="width:100%;">  
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
    </div>      
</div>
@endsection
