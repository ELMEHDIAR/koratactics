<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

      <title> koora.tactics  </title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<link href="{{ asset('css/fontawesome.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/all.css')}}" rel="stylesheet" type="text/css">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('fonts/font-awesome.min.css') }}" rel="stylesheet">
 
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src={{ asset('/storage/images/logo.png') }}  width="70px" height="55px" alt="">   
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink mt-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Competitions
                        </a>
                        <div class="dropdown-menu text-center" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="{{route('golden_boot')}}">EUROPEAN GOLDEN BOOT </a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

        <br><br>

      @auth
        <div class="container">
          
                <div class="col-md-8">   
                    <main class="py-4">
                    @yield('content')
                    </main> 
                        </div>
                    </div>     
                </div> 
            </div> 
            @else
            <main class="py-4">
                @yield('content')
                </main>          
      @endauth

            </div>  
</body>
</html>
