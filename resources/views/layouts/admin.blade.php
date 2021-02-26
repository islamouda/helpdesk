<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'METTCO') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
<style>

</style>

</head>
<body>
    <div id="app">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('administrator.ticket') }}">Ticket <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('administrator.user') }}">User</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('administrator.item') }}">Item</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="{{ route('chart') }}" tabindex="-1" aria-disabled="true">Chart</a>
                        </li>
                      </ul>
                    </div>
                  </nav>



                           <main class="py-4">
                            @yield('admin')
                        </main>




                        <script src="{{ asset('js/app.js') }}" ></script>
                        <!-- Plugin JavaScript -->
                        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

                        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>


                      <script>
                              $(document).ready(function() {
                                  $('#ticket').DataTable( {
                                      scrollY:        '50vh',
                                      scrollCollapse: true,
                                      paging:         false
                                  } );
                              } );
                      </script>
                      @yield('js')


    </div>
</body>
</html>
