<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>METTCO</title>

        <!-- Fonts -->
        
        <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
        <link rel="stylesheet" href="{{asset('./css/w3.css')}}">
        <!-- Styles -->
        <style>
            html {
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
                font-size: 84px;
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
    <body>


            <!-- Navbar (sit on top) -->
            <div class="w3-top">
              <div class="w3-bar w3-white w3-wide w3-padding w3-card">
                <a href="/userpage" class="w3-bar-item w3-button"><b>METTCO</b> </a>
                <!-- Float links to the right. Hide them on small screens -->
                <div class="w3-right w3-hide-small">

                  @if (Route::has('login'))

                      @auth
                          <a href="{{ route('pages.user') }}"  class="w3-bar-item w3-button">Home</a>
                      @else
                          <a href="{{ route('login') }}" class="w3-bar-item w3-button">Login</a>

                          @if (Route::has('register'))
                              <a href="{{ route('register') }}" class="w3-bar-item w3-button">Register</a>
                          @endif
                      @endauth

              @endif
                </div>
              </div>
            </div>

            <!-- Header -->
            <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
              <img class="w3-image" src="./img/wellcom.jpg" alt="Architecture" width="1500" height="800">
              <div class="w3-display-middle w3-margin-top w3-center">
                <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-opacity-min" style="background-color:#9e1e1e !important;letter-spacing: 0;padding: 2px 5px !important;"><b>M</b></span><span class="w3-hide-small w3-text-light-grey" style="color:#9e1e1e !important">ETTCO</span></h1>
              </div>
            </header>



    </body>
</html>




