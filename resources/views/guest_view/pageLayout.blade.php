<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- JS -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> FISH RATE</title>



</head>
<body>

        <div class="navbar1">
            <div class="navbar1-top-right">
                <ul>
                    <li>ABOUT US</li>
		    <li><a href="market" class="">MARKET</a></li>
                    <li><a href="reportView" class="">REPORT</a></li>
                </ul>
            </div>
            
            <div class="logo-navbar"><a href="fishrate/"><img src={{asset('img/logo.png')}} alt=""></a></div>
        </div>


    <div class="content">
        @yield('content')
    </div>


</body>
</html>