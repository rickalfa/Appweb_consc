@extends('loyouts.app')

@section('content')

<div class="container-fluid">

    <div
        class="row g-2">
        <div class="col-md-2">
            <x-navsidebar/>
        </div>
        <div class="col-md-10 text-light">
            <h1> Items user :</h1>
            <h3> {{ Auth::user()->name}}</h3>

            <div class="container-fluid">
                <h1 class="text-center mb-5">Items Creados por el Usuario</h1>
               
        
                <div class="row g-4">

                    @php
                     
                     
                     
                    @endphp

                    @if($items->isNotEmpty())
                        @foreach($items as $item)
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100"> {{-- h-100 para que todas las tarjetas tengan la misma altura --}}
                                    <div class="card-body card-text-limited">
                                        <h2 class="card-title">{{ $item->title }}</h2>
                                        <p class="card-text"><strong>Nombre:</strong> {{ $item->name }}</p>
                                        <p class="card-text"><strong>Descripción:</strong> {{ $item->description }}</p>
                                        <p class="card-text"><strong>Precio:</strong> ${{ $item->price }}</p>
                                        <p class="card-text"><strong>Tipo:</strong> {{ $item->item_type }}</p>
                                        <p class="card-text"><strong>Publicado:</strong> {{ $item->published_at }}</p>
                                  
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="m-2">
                                            <a href="{{ route('items.show', $item->id) }}" class="btn btn-primary">Ver Detalles</a>
                                        </div>
                                    </div>

                                    @if ($loop->last)
                                    <a href="https://www.ejemplo.com" target="_blank" class="icon-link">
                                        <i class="glyphicon glyphicon-plus"></i>  {{--  Icono de Bootstrap 3  --}}
                                    </a>
                                @endif
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-6 col-lg-4">

                            <!-- START RUTA A CREATE ITEMS--->
                            <a href="{{route('items.create')}}">
                                <div class="card h-100"> {{-- h-100 para que todas las tarjetas tengan la misma altura --}}
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-center">
                                                <h2 class="card-title text-dark">Add </h2>
                                                <i class="p-2 bi bi-plus-square" style="font-size: 4rem; color: rgb(107, 18, 223);"></i>
                                                
                                                </div>
                                    
                                            </div>

                                
                                        <a href="https://www.ejemplo.com" target="_blank" class="icon-link">
                                        <i class="glyphicon glyphicon-plus"></i>  {{--  Icono de Bootstrap 3  --}}
                                    </a>
                            
                                </div>
                           </a><!-- END RUTA A CREATE ITEMS--->
                        </div>
                    @else
                        <div class="col-12">
                            <div class="alert alert-warning" role="alert">
                                No has creado ningún item aún.
                            </div>
                        </div>
                    @endif
                </div>

        </div>
        
    </div>
    

</div>




@endsection