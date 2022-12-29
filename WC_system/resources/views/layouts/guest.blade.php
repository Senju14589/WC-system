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
    </style>
</head>

<body onload="init();">

    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    @laravelViewsScripts
</body>

</html>
