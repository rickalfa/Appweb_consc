@extends('loyouts.app')

@section('content')

<div
    class="container-fluid">
    <div class="row justify-content-center align-items-center gx-2 text-light">
       <h1> Profile</h1>
        <div class="col"><h2> {{Auth::user()->name}} </h2></div>
        <div class="col">

            <div class="card" style="width:350px">
                <img class="p-2 card-img-bottom" src="https://picsum.photos/id/237/200" alt="Card image">
                <div class="card-body">
                  <h4 class="card-title">{{Auth::user()->name}}</h4>
                  <p class="card-text">      
                       <label for="email"> Email : {{Auth::user()->email}}</label>
                    </p>
                    <p class="card-text">

                        @if(Auth::user()->email_verified_at == null)
                        Email status  : <span class="badge bg-danger">no verificado</span>
                        @else

                       
                        Email status :  {{Auth::user()->email_verified_at ? Auth::user()->email_verified_at->format('Y-m-d H:i:s')  : "no verificado"}}
                     
                        @endif
                    </p>
                  
                   
                    <p class="card-text">

                        country : {{Auth::user()->country}}

                    </p>
                  
                  <a href="#" class="btn btn-primary">Edit profile</a>
                </div>
              </div>
     </div>
        <div class="col">

    

        </div>
    </div>
    
</div>




@endsection