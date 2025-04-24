@extends('loyouts.app')

@section('content')


<div class="container-fluid">
    <div class="row justify-content-center align-items-start gy-1 text-light" >
        <div class="col-2 ">Lateral menu</div>
        <div class="col-10 ">
            <h1> Items</h1>

            <div class="d-flex flex-row flex-wrap"> 

                @foreach ($Items as $item)
                <div class="card text-center mb-3 mx-1" style="width: 14rem; height: 18rem;">
            
                    <div class="card-body">
               
                      
                            <h5 class="card-title card-title-limited">{{ $item->title}}</h5>
                            <p class="card-text-limited p-1">{{ $item->description}}</p>

                            <div class="card-footer text-muted">
                              <p class="card-text mb-1"><small>created: {{ $item->created_at}}</small></p>
                            </div>  
                        
                    </div>

                </div>
                @endforeach
            </div>

        </div>
       
    </div>
    
</div>




@endsection