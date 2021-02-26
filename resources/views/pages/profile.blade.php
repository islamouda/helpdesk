


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>METTCO</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html {
                background-color: #fff;
                color: #636b6f;

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
            .w3-wide {
                letter-spacing: 0px !important;
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

            <div class="card" style="width:45rem;">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

{{-- main code start  --}}
@include('pages.flash-message')
<form method="post" action="{{ route('profile.create') }}" enctype="multipart/form-data"  >
        @csrf
<div class="container">
        <div class="row">
          <div class="col">
            <div class="input-group mb-3">



            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">HR ID</span>
            </div>
            <input  type="number" name="hr_id" class="form-control" placeholder="Your ID" aria-label="hr_id" aria-describedby="basic-addon1" required>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col">
         <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Site</label>
            </div>
            <select name="site_id" class="custom-select" id="inputGroupSelect01" required>
                <option disabled selected>Choose...</option>
                @foreach ($site as $site_id)
                <option value="{{ $site_id->id }}">{{ $site_id->site }}</option>
                @endforeach
            </select>
            </div>
          </div>
          <div class="col">
         <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Dep.</label>
            </div>
            <select name="department_id" class="custom-select" id="inputGroupSelect01" required>
                    <option disabled selected>Choose...</option>
                    @foreach ($department as $department_id)
                    <option value="{{ $department_id->id }}">{{ $department_id->department }}</option>
                    @endforeach
            </select>
            </div>
          </div>
          <div class="col">
         <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Position</label>
            </div>
            <select name="position_id" class="custom-select" id="inputGroupSelect01" required>
                    <option disabled selected>Choose...</option>
                    @foreach ($position as $position_id)
                    <option value="{{ $position_id->id }}">{{ $position_id->position }}</option>
                    @endforeach
            </select>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col">

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Phone Number</span>
                </div>
                <input type="number" name="mobile" class="form-control" placeholder="Your Phone Number" aria-label="hr_id" aria-describedby="basic-addon1" required>
                </div>
                </div>

            <div class="col">
           <div class="input-group">
                <input type="number" name="ip_phone" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" required>
                <div class="input-group-append">

                    <span class="input-group-text">Ext.</span>
                </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col">
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01">Upload Your Photo</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                            </div>
                          </div>
            </div>
        </div>


        <button type="submit" class="btn btn-success">Next</button>

    </div>

    </form>

{{-- main code end  --}}
                </div>
            </div>

{{--  code main  --}}
            </div>
            </header>



    </body>
</html>





