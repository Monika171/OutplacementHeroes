@extends('layouts.main')
@section('content')

<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
  <!--<div class="overlay"></div>-->
  <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="{{route('company')}}">Companies <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$company->cname}}</h1>
            </div>
        </div>
  </div>
</div>

<br>
<br>


   <div class="album text-muted">
     <div class="container">
       <div class="row" id="app">
          <div class="title" style="margin-top: 20px;">
                <h2></h2> 
          </div>

          @if(empty($company->cover_photo))
          <img src="{{asset('cover/work.jpg')}}" style="width:100%;">

          @else
          <img src="{{asset('uploads/coverphoto')}}/{{$company->cover_photo}}" style="width: 100%;">


          @endif

          <div class="col-lg-12">
            
            
            <div class="p-4 mb-8 bg-white">
              
              <div class="company-desc">		
                  @if(empty($company->logo))

                  <img width="100" src="{{asset('profile_pic/logo.jpg')}}">

                  @else
                  <img width="100" src="{{asset('uploads/logo')}}/{{$company->logo}}">


                  @endif

                  {{--<h1>{{$company->cname}}</h1>--}}
                  <p><small>Slogan-{{$company->slogan}}</small></p>
                  <p>{{$company->description}}</p>
                  <p>Address-{{$company->address}}&nbsp; Phone-{{$company->phone}}&nbsp; Website-{{$company->website}}</p>

              </div>

            </div>

        
              
        </div>
          
         
          
            
      </div>

          
          
       



    </div>
  </div>
@endsection
