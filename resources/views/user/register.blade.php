
@extends('loyouts.app')

@section('content')
<div class="container-fluid">

<div class="row">

    <div class="col-md-4">

        
    <div id="toastComponent"></div>



    </div>
    <div class="col-md-4 col-sm-12">

            <div class="form-container border border-3 border-secondary rounded-3 p-3">
                <h2 class="text-center text-light mb-4">Registro</h2>
               
                <form  id="form-register" action="{{url('/storeuser')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-light">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required maxlength="255">
                        <div class="error-message text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-light">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="error-message text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-light">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required minlength="8" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$">
                        <div class="form-text text-light">La contraseña debe tener al menos 8 caracteres y contener al menos una letra mayúscula y un número.</div>
                        <div class="error-message text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label text-light">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        <div class="error-message text-danger"></div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Registrarse</button>

<!----------------------- Mensajes  success--------------------------------------------------------->
          
                
                    <div id="successMessage" class="alert alert-success d-none mt-3"></div>
                
                    <div id="generalError" class="alert alert-danger d-none mt-3"></div>

                </form>
<!--------------------------------- Mensjae de carga------------------>
                <div id="loadingComponent" class="d-none"> 
                </div>
                
            </div>
   
        
    </div>
    <div class="col-md-4 bg-green">
        
    </div>

</div>
    

</div>
@endsection


