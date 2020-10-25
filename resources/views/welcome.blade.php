@include('layouts.nav')
 
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!DOCTYPE html>
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

      <title> koora.tactics</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
   
    <link href="{{ asset('css/all.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/fontawesome.css')}}" rel="stylesheet" type="text/css">
    
 
</head>
<body>  
</body>
</html>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>  

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Scripts -->
       <script src="{{ asset('js/app.js') }}"></script>
 

    <!-- Fonts -->
    


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

    <div class="container">

        
    <body>  

        
        <div class="content">
            <div class="title m-b-md">
                Lastest News ..  
                <hr class="text-center">
            </div> 

            <div class="links">
                <div class="card-group mr-3 ml-3">
                    @foreach ($post as $post)
                    <div class="card">
                      <img class="card-img-top" src="{{asset('storage/' . $post->image)}}" height="400px" width="100px" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title"> {{ \Illuminate\Support\Str::limit($post->title,30)}} </h5>
                        <p class="card-text">{{\Illuminate\Support\Str::limit(strip_tags($post->content))}}.</p>
                        <p class="card-text"><small class="text-muted"><i class="fa fa-calendar"></i> {{ $post->created_at->format('d') }} {{ $post->created_at->format('M') }} -</small>
          
                            @if ($post->category->name == "News")
                            <a href="/posts"> {{$post->category->name}} </a> 
                            @elseif($post->category->name == "Transfers")
                            <a href="/users"> {{$post->category->name}} </a>
                            @endif
                            
                        </p>
                      </div>
                    </div> 

                    @endforeach
                              
         
        </div>
    </div>
</body>


    </div>
</html>  
 