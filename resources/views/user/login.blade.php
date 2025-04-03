@extends('loyouts.app')

@section('content')

<div class="container-fluid" >
<div class="row">

      <div class="col-lg-4"></div>

      <div class="col-lg-4 col-md-12"> 
        <div class="border border-3 border-secondary p-3 rounded-3">
          
          <div class="d-flex justify-content-center">
          <div class="p-2 text-light"> <h1> sign in</h1></div>
          </div>

            <form action="{{ route('validar-credenciales') }}" method="POST" id="formregister">
            
            @csrf
            <div class="mb-3 mt-3">
                <label for="email" class="form-label text-white">Email:</label>
                <input type="email" class="form-control bg-dark text-secondary" id="email" placeholder="Enter email" name="email">
              </div>
              <div class="mb-3">
                <label for="pwd" class="form-label text-white">Password:</label>
                <input type="password" class="form-control bg-dark text-light" id="pwd" placeholder="Enter password" name="pswd">
              </div>
    
              <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>

      <div class="col-lg-4"></div>

    </div>
</div>
</div>

@endsection