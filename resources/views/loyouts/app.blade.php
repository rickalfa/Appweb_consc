<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-dark">
    <div id="app">
 
      <x-navbarmain/>

        <main class="py-4">
            @yield('content')
        </main>

        </div>
        <!---------- END Main CONTAINER NAV-->
    </div>




    @vite('resources/js/app.js') {{-- Si solo quieres cargar el JS al final --}}
</body>
</html>