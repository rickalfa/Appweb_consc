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
           <li class="nav-item">
            <a href="{{ url('/items')}}" class="nav-link" aria-current="page" >Items</a>
          </li>

           @auth

           <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
          </li>
           @endauth


           <!-- Contenido para usuarios no autenticados-->
           @guest
           <li class="nav-item">
             <a class="nav-link" href="{{ url('/login') }}">Login</a>
           </li>
         

           <li class="nav-item">
             <a class="nav-link" href="{{ url('/registeruser') }}">Register</a>
           </li>
           @endguest
         </ul>

         @auth
         <div class="col-lg-6">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        

            <li class="nav-item">

              <p>Bienvenido, {{ Auth::user()->name }}</p>
    
            </li>
         </ul>
        
          
         </div>

  
     <div class="col-lg-2">
      
            <div class="dropdown-center">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
              </button>
              <ul class="dropdown-menu">

                <li class="nav-item">
                  <a class="dropdown-item" href="{{route('profile.show', ['username' => auth()->user()->name]) }}}">profile</a>

                </li>

                <li class="nav-item">
                  <a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a>
            

                </li>
                

                <li>
                  
                  <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                  </form>

                </li>
            
              </ul>
            </div>
       </div>
        @endauth

       


         <span class="navbar-text">
           Consc - App
         </span>
       </div>
    
     </div>
     
   </nav>