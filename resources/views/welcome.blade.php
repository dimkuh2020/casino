<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Casino</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}"/>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background: url(img/welcome.jpg) 0px 0px no-repeat;
                background-size: cover; 
               

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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
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
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a style="color: orangered; font-size: 100%" href="{{ url('/home') }}">Home</a>
                    @else
                        <a style="color: orangered; font-size: 100%" href="{{ route('login') }}">Login</a>
                        <a style="color: orangered; font-size: 100%" href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content" style="color: orangered;">
                <div class="title m-b-md">
                    Welcome to online casino!
                    <div style="font-size: 60%">Please log in to start playing</div> 
                </div>                
            </div>
        </div>
    </body>
</html>
