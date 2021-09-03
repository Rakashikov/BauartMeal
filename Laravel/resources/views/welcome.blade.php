<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000000;
                font-family: 'Source Sans Pro', sans-serif;;
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
                width: 70%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .title {
                font-size: 84px;
                /* margin-right: 100px; */
                margin-top: 125px;
                display: flex;
                flex-direction: column;
                align-items: flex-end;
                justify-content: center;
                width: 50%;
            }

            .links > a {
                color: #000000;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                color: black;
            }

            .welcome_container{
                display: flex;
                width: 100%;
                margin-bottom: 35px;
                height: auto;
            }

           
            .img{
                width: 40%;
                height: auto;
            }

            .image_welcome{
                display: flex;
    justify-content: flex-end;
    width: 55%;
    flex-direction: column;
    align-items: flex-start;
            }

        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="welcome_container">
                <div class="title">
                    <b>BAUART</b> Meal
                </div>
                <div class="image_welcome">
                <img class="img" src="assets\img\fast-food.svg">
                </div>
                </div>
                <div class="links">
                    <a href="restaurants/index">Restaurans</a>
                    <a href="orders/index">History</a>

                   
                </div>

            


            </div>
        </div>
    </body>
</html>
