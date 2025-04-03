<nav class="navbar navbar-expand-lg bg-light">
    <!---------- Main CONTAINER NAV-->
     <div class="container-fluid">
    
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <a class="navbar-brand" href="#">Consc Studios</a>

    
       <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           <li class="nav-item">
             <a href="{{ url('/') }}" class="nav-link active" aria-current="page" href="#">Home</a>
           </li>
           <!-- Contenido para usuarios no autenticados-->
           @guest
           <li class="nav-item">
             <a class="nav-link" href="{{ url('/login') }}">Login</a>
           </li>
           @endguest

           <li class="nav-item">
             <a class="nav-link" href="{{ url('/registeruser') }}">Register</a>
           </li>
         </ul>

         @auth
            <p>Este contenido solo se mostrará a usuarios autenticados.</p>
            <p>Bienvenido, {{ Auth::user()->name }}</p>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
            </form>
        @endauth

       


         <span class="navbar-text">
           Consc - App
         </span>
       </div>
    
     </div>
     
   </nav>