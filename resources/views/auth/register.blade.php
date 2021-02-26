

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('./css/w3.css')}}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
              <img class="w3-image" style="filter: blur(5px) contrast(70%);" src="./img/wellcom.jpg" alt="Architecture" width="100%" height="500px">
              <div class="w3-display-middle  w3-center" style="top: 40% !important;" >
{{--  code main  --}}
<div class="card " style="width:30rem">
        <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="form-group">

                                <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                        </div>

        <div class="form-group">
                <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

        </div>
        <div class="form-group">
                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
        </div>

            <div class="form-group row mb-0">
                    <div class="col">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                </div>
      </form>
    </div>

</div>
{{--  code main  --}}
            </div>
            </header>



    </body>
</html>





