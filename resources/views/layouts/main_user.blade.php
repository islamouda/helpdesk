<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>METTCO</title>

        <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/resume.min.css') }}" rel="stylesheet">
    

    @yield('css')
    @yield('report_css')

    <style>
    .list-user{
        max-height: 430px;
        margin-bottom: 10px;
        overflow:scroll;
        -webkit-overflow-scrolling: touch;
        padding: 0rem;
    }

    .metco_image{
        width: 100%;

        background-image: url('./img/metco_image.png');
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;

    }
    .checkbox-grid li {
        display: block;
        float: left;
        width: 25%;
        }


        .card_profile {
            * {
                box-sizing: border-box;
                line-height: 1.5;
                font-family: 'Open Sans', sans-serif;
              }

              img {
                max-width: 100%;
              }

              .container {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                background: #444;
              }

              .card {
                position: relative;
                background: #333;
                width: 400px;
                height: 75vh;
                border-radius: 6px;
                padding: 2rem;
                color: #aaa;
                box-shadow: 0 .25rem .25rem rgba(0,0,0,0.2),
                  0 0 1rem rgba(0,0,0,0.2);
                overflow: hidden;

                &__image-container {
                  margin: -2rem -2rem 1rem -2rem;
                }

                &__line {
                opacity: 0;
                animation: LineFadeIn .8s .8s forwards ease-in;
                }

                &__image {
                  opacity: 0;
                  animation: ImageFadeIn .8s 1.4s forwards;
                }

                &__title {
                  color: white;
                  margin-top: 0;
                  font-weight: 800;
                  letter-spacing: 0.01em;
                }

                &__content {
                  margin-top: -1rem;
                  opacity: 0;
                  animation: ContentFadeIn .8s 1.6s forwards;
                }

                &__svg {
                  position: absolute;
                  left: 0;
                  top: 115px;
                }
              }

              @keyframes LineFadeIn {
                0% { opacity: 0; d: path("M 0 300 Q 0 300 0 300 Q 0 300 0 300 C 0 300 0 300 0 300 Q 0 300 0 300 "); stroke: #fff; }
                50% { opacity: 1; d: path("M 0 300 Q 50 300 100 300 Q 250 300 350 300 C 350 300 500 300 650 300 Q 750 300 800 300"); stroke: #888BFF; }
                100% { opacity: 1; d: path("M -2 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 802 400"); stroke: #545581; }
              }

              @keyframes ContentFadeIn {
                0% { transform: translateY(-1rem); opacity: 0; }
                100% { transform: translateY(0); opacity: 1; }
              }

              @keyframes ImageFadeIn {
                0% { transform: translate(-.5rem, -.5rem) scale(1.05); opacity: 0; filter: blur(2px); }
                50% { opacity: 1; filter: blur(2px); }
                100% { transform: translateY(0) scale(1.0); opacity: 1; filter: blur(0); }
              }
          }



    </style>
</head>
<body>


    <body id="page-top">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    METTCO Help Desk
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
          <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Clarence Taylor</span>
            <span class="d-none d-lg-block">
                @php
                    $auth_user = Auth::user();
                @endphp
              <img class="img-fluid img-profile rounded-circle  mb-2" src="{{ $auth_user->profile['avatar'] }}" alt="" style="width:7rem; height: 7rem; ">
              <p>{{ $auth_user->name }}</p>
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#ticket">Ticket</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#my_ticket">My Ticket</a>
                </li>
                <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#dirctory">Directory</a>
                </li>
            @if (Auth::user()->privilege == 2 || Auth::user()->privilege == 3 )


              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{ route('allticket') }}">All Ticket</a>
              </li>
              @endif
              @if (Auth::user()->privilege == 3)
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{ route('report') }}">Statistic</a>
              </li>
              @endif
            </ul>
          </div>
        </nav>


        <div class="container-fluid p-0">
          <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" style="max-width: 100%;" id="ticket" style="padding-top: 1rem !important;">

                    <div class="container">
                            <div class="row">
                              <div class="col-9">
                                    @include('pages.flash-message')
                                    @yield('ticket')
                            </div>
                            <div class="col-3 metco_image" >

                            </div>


                    </div>

            </div>
          </section>

          <hr class="m-0">
          <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="my_ticket">
                <div class="w-100">
                @yield('my_ticket')
                </div>
              </section>
              <hr class="m-0">

          <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="dirctory">
            <div class="w-100">

            @yield('dirctory')
            </div>
          </section>
          <hr class="m-0">




          {{--  <section class="resume-section p-1 p-lg-5 d-flex align-items-center" id="user">
            <div class="w-100">
                @yield('user')
            </div>
          </section>
--}}
          {{-- <hr class="m-0">
          @if (Auth::user()->privilege == 3)
          <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="report">
            <div class="w-100">
                @yield('report')
            </div>
          </section>
          @endif --}}
        </div>




  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" ></script>
  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/resume.min.js"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  @yield('js')
  @yield('report_js')


    <script>
        $(document).ready(function() {
            $('#users').DataTable( {
                scrollY:        '50vh',
                scrollCollapse: true,
                paging:         false
            } );
        } );





    </script>

</body>
</html>
