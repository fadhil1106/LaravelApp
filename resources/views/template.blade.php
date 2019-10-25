<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>LaravelApp</title>

        {{-- Memanggil File CSS --}}
        <link rel="stylesheet" href="{{ asset('bootstrap_3_3_7/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        

        <!--[if it IE 9]>
        <script src="{{ asset('http://laravelapp.test/js/html5shiv_3_7_2.min.js') }}"></script>
        <script src="{{ asset('http://laravelapp.test/js/respond_1_4_2.min.js') }}"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            @include('navbar')
            @yield('main')
        </div>

        @yield('footer')
        <script src="{{ asset('js/html5shiv_3_7_2.min.js') }}"></script>
        <script src="{{ asset('js/jquery_3_3_1.min.js') }}"></script>
        <script src="{{ asset('bootstrap_3_2_0/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/laravelapp.js') }}"></script>
    </body>
</html>
