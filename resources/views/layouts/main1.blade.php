<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
	<title>@yield('title')</title>	
	@yield('loginLinks')
	@yield('select2css')
	@include('../partials.head')
	<link rel="stylesheet" href="{{asset('external/css/style_nav2m.css')}}">
	<script defer src="{{ asset('js/app.js') }}"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet" />	
	 <link rel="shortcut icon" type="image/png" href="{{ asset('HomeImages/Favicon.png') }}">
</head>
<body>
	@include('../partials1.nav')
	<div class=" bg-light " style="height:80px; width:100%; clear:both;"></div>
	@yield('content')
	
	<div class=" bg-light " style="height:400px; width:100%; clear:both;"></div>
	 @include('../partials1.footer1')

	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 @yield('jsplugins')

		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
		<script src="{{asset('js/script.js')}}"></script>
	
		<!-- toastr JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

		
</body>
</html>