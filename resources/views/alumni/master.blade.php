<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{ URL::asset('alumni/css/bootstrap.min.css')}}">
    <title>Alumni Management System</title>
    @stack('styles')
</head>
<body>
<header>
    <div class="container-fluid bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark text-center">
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('alumni/img/bakary.png')}}" alt="" style="width:70px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav text-color">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{url('user/registration')}}">Registration</a>
                        </li>
                        @if(Auth::check() && Auth::user()->role_id <= 3)
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{url('peoples')}}">Registered People</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{url('search')}}">Search</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{url('about')}}">About</a>
                        </li>
                        @isset(Auth::user()->id)
                        @if(Auth::user()->role_id <= 3)
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{url('event')}}">Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{url('notice')}}">Notice</a>
                        </li>
                        @endif
                        @endisset
                        @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{url('profile')}}">Profile</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            @if(Auth::check())
                                <a class="nav-link text-light" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                            <a class="nav-link text-light" href="{{url('login')}}">Sign In</a>
                            @endif
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

@yield('content')

<footer>
    <div class="container-fluid pr-0 pl-0">
        <div class="row">
            <div class="col-md-12 text-right bg-primary pt-2 pb-2"><a href="" class="link text-success text-light pr-2">&copy;Robin Rahman</a></div>
        </div>
    </div>
</footer>

<script src="{{URL::asset('alumni/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{URL::asset('alumni/js/bootstrap.min.js')}}"></script>
@stack('scripts')
</body>
</html>
