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
      $( '.datepicker' ).datepicker({
      dateFormat: 'dd-mm-yy',
      changeMonth: true,
      changeYear: true,
      yearRange: "-70:+0"
      
    });


    $('.datepicker-Y').datepicker( {
    dateFormat: "yy",
    yearRange: "c-100:c",
    changeMonth: false,
    changeYear: true,
    showButtonPanel: false,
    closeText:'Select',
    currentText: 'This year',
    onClose: function(dateText, inst) {
      var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
      $(this).val($.datepicker.formatDate('yy', new Date(year, 1, 1)));
    },
    onChangeMonthYear : function () {
      $(this).datepicker( "hide" );
    }
  }).focus(function () {
    $(".ui-datepicker-month").hide();
    $(".ui-datepicker-calendar").hide();
    $(".ui-datepicker-current").hide();
    $(".ui-datepicker-prev").hide();
    $(".ui-datepicker-next").hide();
    $("#ui-datepicker-div").position({
      my: "left top",
      at: "left bottom",
      of: $(this)
    });
  }).attr("readonly", false);


  $('.datepicker-YM').datepicker( {
    yearRange: "c-100:c",
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    closeText:'Select',
    currentText: 'This year',
    onClose: function(dateText, inst) {
      var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
      var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
      $(this).val($.datepicker.formatDate('MM yy (M y) (mm/y)', new Date(year, month, 1)));
    }
  }).focus(function () {
    $(".ui-datepicker-calendar").hide();
    $(".ui-datepicker-current").hide();
    $("#ui-datepicker-div").position({
      my: "left top",
      at: "left bottom",
      of: $(this)
    });
  }).attr("readonly", false);

    });

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
    @yield('select2css')
    {{--<style>
        /* width */
        ::-webkit-scrollbar {
            width: 7px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #a7a7a7;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #929292;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            list-style: none;
        }

        .user-wrapper, .message-wrapper {
            border: 1px solid #dddddd;
            overflow-y: auto;
        }

        .user-wrapper {
            height: 600px;
        }

        .user {
            cursor: pointer;
            padding: 5px 0;
            position: relative;
        }

        .user:hover {
            background: #eeeeee;
        }

        .user:last-child {
            margin-bottom: 0;
        }

        .pending {
            position: absolute;
            left: 13px;
            top: 9px;
            background: #b600ff;
            margin: 0;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            line-height: 18px;
            padding-left: 5px;
            color: #ffffff;
            font-size: 12px;
        }

        .media-left {
            margin: 0 10px;
        }

        .media-left img {
            width: 64px;
            border-radius: 64px;
        }

        .media-body p {
            margin: 6px 0;
        }

        .message-wrapper {
            padding: 10px;
            height: 536px;
            background: #eeeeee;
        }

        .messages .message {
            margin-bottom: 15px;
        }

        .messages .message:last-child {
            margin-bottom: 0;
        }

        .received, .sent {
            width: 45%;
            padding: 3px 10px;
            border-radius: 10px;
        }

        .received {
            background: #ffffff;
        }

        .sent {
            background: #3bebff;
            float: right;
            text-align: right;
        }

        .message p {
            margin: 5px 0;
        }

        .date {
            color: #777777;
            font-size: 12px;
        }

        .active {
            background: #eeeeee;
        }

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 15px 0 0 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid #cccccc;
        }

        input[type=text]:focus {
            border: 1px solid #aaaaaa;
        }
    </style>--}}
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
                            <li class="nav-item"><a href="{{route('seeker.index')}}" class="nav-link">
                                <i class="fa fa-users" aria-hidden="true"></i> Job-Seekers</a></li>
                            <li class="nav-item"><a href="{{route('job.create')}}" class="nav-link">Post a job</a></li>
                
                            @elseif(Auth::user()->user_type=='seeker')
                            <li class="nav-item"><a href="{{route('user.dashboard')}}" class="nav-link">Dashboard</a></li>
                            <li class="nav-item"><a href="{{route('user.saved')}}" class="nav-link">
                                <i class="fa fa-tag" aria-hidden="true"></i>Saved-Jobs</a></li>
                            <li class="nav-item"><a href="{{route('my.messages')}}" class="nav-link">Inbox</a></li>
                
                            @elseif(Auth::user()->user_type=='volunteer')
                            <li class="nav-item"><a href="{{route('vseeker.index')}}" class="nav-link">Dashboard</a></li>
                            <li class="nav-item"><a href="{{route('my.messages')}}" class="nav-link">
                                <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Inbox</a></li>
                
                            @elseif(Auth::user()->user_type=='jvolunteer')
                            <li class="nav-item"><a href="{{route('jvseeker.index')}}" class="nav-link">Dashboard</a></li>
                            <li class="nav-item"><a href="{{route('my.messages')}}" class="nav-link">
                                <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Inbox</a></li>
                
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

    @yield('jsplugins')

 {{--   <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () {
        // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('32dfe93f00a3d5a1e6ca', {
        cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
            // alert(JSON.stringify(data));
            if (my_id == data.from) {
                $('#' + data.to).click();
            } else if (my_id == data.to) {
                if (receiver_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.pending').html());

                    if (pending) {
                        $('#' + data.from).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.from).append('<span class="pending">1</span>');
                    }
                }
            }
        });

        $('.user').click(function () {
            $('.user').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pending').remove();

            receiver_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "message/" + receiver_id, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });
        });

        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();

            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "message", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {

                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });
    });

    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }
</script>--}}
</body>
</html>
