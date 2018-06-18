<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="@if(!Auth::check()) guest @endif">
@if(Auth::check())
  <div class="sidenav">
      <div class="user_info">
          <img src="{{asset('images/user_icon.png')}}" />
          <h4 class="user_name">{{ auth()->user()->name }}</h4>
      </div>
      <div class="navigation">
          <a href=" {{ route('user.index') }}"><i class="fas fa-home link-icon"></i>Dashboard</a>
          <a href="{{ route('user.interests') }}"><i class="fas fa-heart link-icon"></i>My Interests</a>
          <a href="{{ route('user.study.index') }}"><i class="fas fa-graduation-cap link-icon"></i>My Study</a>
          <a href="{{ route('user.settings') }}"><i class="fas fa-cog link-icon"></i>Account settings</a>
          <a class="logout" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt link-icon"></i>{{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
  </div>
@endif

    <main class="@if(Auth::check()) logged-in @endif">
        @yield('content')
    </main>
</div>
<!-- Side navigation -->
</body>
</html>
