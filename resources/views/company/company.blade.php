@extends('layouts.main')
@section('content')

<div class="container mt-3">
    <h2>Companies</h2>
    <br>
    <br>
	<div class="row">
        <div class="card-deck">
            @foreach($companies as $company)
            <!--<div class="col-md-3">card mb-3-->

                <!--<div class="card" style="width: 18rem;">-->
                <div class="col-sm-3" style="min-width: 18rem; max-width: 18rem;">
                    @if(empty($company->logo))
                    <img width="100" src="{{asset('profile_pic/logo.jpg')}}"class="card-img-top">

                    @else
                    <img width="100" src="{{asset('uploads/logo')}}/{{$company->logo}}"class="card-img-top">


                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$company->cname}}</h5>
                
                        <center><a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">View Company</a></center>
                    </div>
                </div>

            <!--</div>-->
		    @endforeach
        </div>
	</div>
	<br><br><br>
			{{$companies->links()}}

</div>
@endsection