<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OutplacementHeros') }}</title>

    <!-- Scripts -->
    <script defer src="{{ asset('js/app.js') }}"></script>

    <!--modified here-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $( function() {
          $( "#datepicker" ).datepicker();
        } );
    </script>


    <!--modified here-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!--modified here-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--modified here-->

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'OutplacementHeros') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        
                            {{--@if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Job Seeker') }}</a>
                            </li>
                            @endif--}}
                           

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('employer.register') }}">{{ __('Hiring Employer') }}</a>
                            </li>
                
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('consultant.register') }}">{{ __('Consultant') }}</a>
                            </li>
                
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('semployer.register') }}">{{ __('Separating Employer') }}</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    
                                   Mentor
                        
                                    <span class="caret"></span>
                                </a>
                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                
                                        <a class="dropdown-item" href="{{ route('volunteer.register') }}">
                                            <strong>{{ __('Mentor Support') }}</strong>
                                        </a>                 
                
                                        <a class="dropdown-item" href="{{ route('jvolunteer.register') }}"
                                        >
                                        <strong>{{ __('Mentor (Job-Search Support)') }}</strong>
                                        </a>
                                        
                                </div>
                            </li>
                            


                            <li class="nav-item">
                                <a class="nav-link text-white bg-dark" href="{{ route('login') }}">
                                    &ensp;<strong>{{ __('LOGIN') }}</strong>&ensp;</a>
                            </li>


                        @else
                            <li class="nav-item"><a href="{{route('company')}}" class="nav-link" >Companies</a></li>

                            @if(Auth::user()->user_type=='employer')
                
                            <li class="nav-item"><a href="{{route('my.job')}}" class="nav-link">Dashboard</a></li>
                            <li class="nav-item"><a href="{{route('job.create')}}" class="nav-link">Post a job</a></li>
                
                            @elseif(Auth::user()->user_type=='seeker')
                                    <li class="nav-item"><a href="{{route('user.dashboard')}}" class="nav-link">Dashboard</a></li>
                
                            @elseif(Auth::user()->user_type=='volunteer')
                            <li class="nav-item"><a href="{{route('vseeker.index')}}" class="nav-link">Dashboard</a></li>
                
                            @elseif(Auth::user()->user_type=='jvolunteer')
                            <li class="nav-item"><a href="{{route('jvseeker.index')}}" class="nav-link">Dashboard</a></li>
                
                            @elseif(Auth::user()->user_type=='admin')  
                            <li class="nav-item"><a href="/dashboard" class="nav-link">Dashboard</a></li>          
                            @endif


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    
                                                                       
                                    @if(Auth::user()->user_type=='employer')
                                    {{Auth::user()->company->cname}}
                                    
                                    @elseif(Auth::user()->user_type=='seeker')
                                    {{Auth::user()->name}}

                                    @elseif(Auth::user()->user_type=='volunteer')
                                    {{Auth::user()->name}}

                                    @elseif(Auth::user()->user_type=='jvolunteer')
                                    {{Auth::user()->name}}

                                    @elseif(Auth::user()->user_type=='semployer')
                                    {{Auth::user()->name}}

                                    @elseif(Auth::user()->user_type=='consultant')
                                    {{Auth::user()->name}}

                                    @elseif(Auth::user()->user_type=='admin')   
                                            {{Auth::user()->name}}  
                                    @endif                                   
                                    
                                    
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                   
                                    @if(Auth::user()->user_type=='employer')

                                    <a class="dropdown-item" href="{{route('company.index',[Auth::user()->company->id,Auth::user()->company->slug])}}"
                                    >
                                        {{ __('My Company') }}
                                    </a>
            
                                    <a class="dropdown-item" href="{{route('applicant')}}">
                                        {{ __('All Applicants') }}
                                    </a> 
            
                                @elseif(Auth::user()->user_type=='semployer')
                                    <a class="dropdown-item" href="{{route('secompany.index',[Auth::user()->secompany->id,Auth::user()->secompany->slug])}}"
                                    >
                                    {{ __('My Company') }}
                                    </a>
                                    
                                @elseif(Auth::user()->user_type=='consultant')
                                    <a class="dropdown-item" href="{{route('consultant.index',[Auth::user()->consultant->id,Auth::user()->consultant->slug])}}"
                                    >
                                    {{ __('My Consultancy') }}
                                    </a>
                                
                                    
                                @elseif(Auth::user()->user_type=='seeker')
            
                                    <a class="dropdown-item" href="{{route('user.show',[Auth::user()->id])}}"
                                    >
                                        {{ __('Profile') }}
                                    </a>
            
                                    @elseif(Auth::user()->user_type=='volunteer')
            
                                    <a class="dropdown-item" href="{{route('volunteer.show',[Auth::user()->id])}}"
                                    >
                                        {{ __('Profile') }}
                                    </a>
            
                                    @elseif(Auth::user()->user_type=='jvolunteer')
            
                                    <a class="dropdown-item" href="{{route('jvolunteer.show',[Auth::user()->id])}}">
                                        {{ __('Profile') }}
                                    </a>
            
            
                                    @elseif(Auth::user()->user_type=='admin')
            
                                    <a class="dropdown-item" href="/dashboard"
                                    >
                                        {{ __('Dashboard') }}
                                    </a>
                                    
                                @endif
            

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
