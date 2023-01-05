<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WCSYSTEM') }}</title>
    <link rel="icon" href="{{ asset('image/WC.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://api.longdo.com/map/?key=493288c90d5c7a95cdcb47755ece25bf"></script>
    <script>
        function init() {
            var map;
            map = new longdo.Map({
                placeholder: document.getElementById('map')
            });
            map.Layers.setBase(longdo.Layers.NORMAL);
            map.location(longdo.LocationMode.Geolocation);
        }
    </script>

    <!-- styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @laravelViewsStyles

    <style>
        #map {
            align: center;
            width: auto;
            height: 300px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
        }

        body {
            overflow: hidden;
            height: 100%;
            padding: 0;
        }

        .lc-block {
            background: #fff;
            border-radius: 2px;
            position: relative;
            padding: 45px 30px 30px;
        }

        .lc-block.toggled {
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
            -webkit-animation-duration: .3s;
            animation-duration: .3s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            z-index: 10;
        }

        .lc-block .form-control {
            text-align: center;
        }

        .lcb-float {
            width: 60px;
            height: 60px;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 -10px 19px rgba(0, 0, 0, .38);
            position: absolute;
            top: -35px;
            left: 50%;
            margin-left: -30px;
        }

        .lcb-float img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            padding: 4px;
        }

        .lcb-float i {
            color: #333;
            font-size: 25px;
            line-height: 60px;
        }

        .lcb-lockscreen {
            position: relative;
        }

        .lcb-lockscreen .form-control {
            padding-right: 35px;
        }

        .lcb-lockscreen .lcbl-btn {
            background-color: #0089fa;
            position: absolute;
            top: 0;
            right: 0;
            width: 30px;
            color: #fff;
            font-size: 15px;
            height: 27px;
            margin: 4px;
            line-height: 26px;
            border-radius: 2px;
        }

        .login-navigation {
            list-style: none;
            padding: 0;
            margin: 0;
            position: absolute;
            width: 100%;
            left: 0;
            bottom: -45px;
        }

        .login-navigation>li {
            display: inline-block;
            margin: 0 2px;
            -webkit-transition: all;
            -o-transition: all;
            transition: all;
            -webkit-transition-duration: 150ms;
            transition-duration: 150ms;
            cursor: pointer;
            vertical-align: top;
            color: #fff;
            line-height: 16px;
            min-width: 16px;
            min-height: 16px;
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        #footer,
        #footer .f-menu>li>a {
            color: #a2a2a2;
        }

        .login-navigation>li>span {
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .login-navigation>li:not(:hover) {
            font-size: 0;
            border-radius: 100%
        }

        .login-navigation>li:hover {
            border-radius: 10px;
            padding: 0 5px;
            font-size: 8px;
        }

        .login-navigation>li:hover>span {
            opacity: 1;
            filter: alpha(opacity=100);
        }

        .lcb-float {
            width: 60px;
            height: 60px;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 -10px 19px rgba(0, 0, 0, .38);
            position: absolute;
            top: -35px;
            left: 50%;
            margin-left: -30px;
            text-align: center;
        }

        .lcb-float i {
            color: #333;
            font-size: 25px;
            line-height: 60px;
        }

        .zmdi {
            display: inline-block;
            font: normal normal normal 14px/1 'Material-Design-Iconic-Font';
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .cr-alt label {
            position: relative;
            padding-left: 28px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .c-gray {
            color: #9e9e9e !important;
        }

        .form-control {
            -webkit-transition: all;
            -o-transition: all;
            transition: all;
            -webkit-transition-duration: .3s;
            transition-duration: .3s;
            resize: none;
            box-shadow: 0 0 0 40px transparent !important;
            border-radius: 0;
        }

        .form-control {
            width: 100%;
            height: 35px;
            padding: 6px 12px;
            background-color: #fff;
            border: 1px solid #e8e8e8;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        }

        .form-control,
        output {
            font-size: 13px;
            line-height: 1.42857143;
            color: #9e9e9e;
            display: block;
        }

        .lc-block {
            box-shadow: 0 1px 11px rgba(0, 0, 0, .27);
        }

        .lc-block,
        .login-content:after {
            vertical-align: middle;
            display: inline-block;
        }

        .btn:not(.btn-alt) {
            border: 0;
        }

        .btn-primary.active,
        .btn-primary.focus,
        .btn-primary:active,
        .btn-primary:focus,
        .btn-primary:hover,
        .open>.dropdown-toggle.btn-primary {
            color: #fff;
            background-color: #008cff;
            border-color: #008cff;
        }

        .btn-primary {
            color: #fff;
            background-color: #008cff;
            border-color: #008cff;
        }
    </style>
</head>

<body onload="init();">

    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    @laravelViewsScripts
</body>

</html>
