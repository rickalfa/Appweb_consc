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
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
       <!---------- Main CONTAINER NAV-->
        <div class="container">

            <a href="http://" target="_blank" rel="noopener noreferrer"> Home</a>
            </nav>

        <main class="py-4">
            @yield('content')
        </main>

        </div>
        <!---------- END Main CONTAINER NAV-->
    </div>
<!---------- Main CONTAINER-->
    <div class="container-fluid">

    <form action="/action_page.php" id="formregister">
       <div class="mb-3 mt-3">
         <label for="email" class="form-label">Email:</label>
         <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
       </div>
       <div class="mb-3">
         <label for="pwd" class="form-label">Password:</label>
         <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
       </div>
       <div class="form-check mb-3">
         <label class="form-check-label">
           <input class="form-check-input" type="checkbox" name="remember"> Remember me
         </label>
       </div>
       <button type="submit" class="btn btn-primary">Submit</button>
     </form>

    </div>
<!---------- END Main CONTAINER-->
    


    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    @vite('resources/js/app.js') {{-- Si solo quieres cargar el JS al final --}}
</body>
</html>