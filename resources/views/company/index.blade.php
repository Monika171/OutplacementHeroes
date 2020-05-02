@extends('layouts.main')
@section('content')
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


            <p>{{$company->description}}</p>
                <h1>{{$company->cname}}</h1>
                <p>Slogan-{{$company->slogan}}&nbsp;Address-{{$company->address}}&nbsp; Phone-{{$company->phone}}&nbsp; Website-{{$company->website}}</p>

            </div>

        </div>

        
              
            </div>
          
         
          
            
          </div>

          
          
       



     </div>
   </div>
@endsection
