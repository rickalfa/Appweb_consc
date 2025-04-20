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
<body class="d-flex flex-column min-vh-100 bg-dark ">
    <div id="app" class="content flex-grow-1">
 
      <x-navbarmain/>

        <main class="py-4">
            @yield('content')
        </main>

        </div>
        <!---------- END Main CONTAINER NAV-->
    </div>

    <footer class="footer text-center text-light">
        <!-- Grid container -->
        <div class="container p-2"></div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
         Created by  © 2025 Copyright:
          <a class="text-light" href="https://conscientiamstudios.tech/" target="_blank">conscientiamstudios.tech</a>
        </div>
        <!-- Copyright -->
      </footer>
    
    @vite('resources/js/app.js') {{-- Si solo quieres cargar el JS al final --}}
</body>


</html>