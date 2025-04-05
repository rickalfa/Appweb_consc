@extends('loyouts.app')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center align-items-center gx-2">
        <div class="col text-light">
            <h5> User : {{Auth::User()->name}}</h5>
        </div>

        <div class="col">
            Column
        </div>
        
        <div class="col">
            Column
        </div>
    </div>

    <div class="row justify-content-center align-items-center gx-2">
        <div class="col text-light">
            <h1> Dashboard</h1>
        </div>

        <div class="col">
            Column
        </div>
        
        <div class="col">
            Column
        </div>
    </div>
    
</div>


@endsection