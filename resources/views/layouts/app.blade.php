<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
    <div class="jumbotron jumbotron-fluid p-0">
      <div class="container">
        <h1 class="display-4 text-monospace font-weight-bold"><a href="/" class="text-decoration-none text-dark">{{ config('app.name') }}</a></h1>
        <!-- <p class="lead">CreatedBy : <a href="http://www.drgagus.com" class="text-decoration-none font-weight-bold">drg.agus</a></p> -->
      </div>

      <nav class="navbar navbar-dark " style="background:#000">
        <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
        
        @guest
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-warning font-weight-bold" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Guest</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                <a class="dropdown-item" href="/tentang">About</a>
            </div>
        </li>
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-warning font-weight-bold" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/akun">Pengaturan</a>
                <a class="dropdown-item" href="/tentang">About</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" >{{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
            </div>
        </li>
        @endguest
      </nav>
    </div>

        <main class="">
            @yield('content')
        </main>
  </div>
</body>
</html>
