@extends('loyouts.app')

@section('content')

<div class="container-fluid">


    <div class="row justify-content-center  gx-2">
        <div class="col-md-2 text-light">
           
            <x-navsidebar/>
        </div>

        <div class="col-md-10 text-light">
            <h5> User : {{Auth::User()->name}}</h5>
        </div>
        
     
    </div>
    
</div>


@endsection