@extends('loyouts.app')

@section('content')

<div class="container-fluid">

    <div
        class="row">
        <div class="col-md-2">
            <x-navsidebar/>
        </div>
        <div class="col-md-10 text-light">
            <h1> ShowUser Items</h1>

            <div class="card shadow-sm mb-4 text-center">
                <div class="card-header">
                  <h5 class="card-title mb-0">{{ $item->title }}</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-subtitle mb-2 text-muted">{{ $item->name }}</h6>
                  <p class="card-text">{{ $item->description }}</p>
              
                  <ul class="list-unstyled mb-3">
                    <li><strong>Precio:</strong> ${{ number_format($item->price, 2) }}</li>
                    <li><strong>Status:</strong> {{ $item->item_type }}</li>
                    <li><strong>Activo:</strong> {{ $item->is_active ? 'Sí' : 'No' }}</li>
                    <li><strong>Fecha de publicación:</strong> {{ \Carbon\Carbon::parse($item->published_at)->format('d/m/Y') }}</li>
                    <li><strong>Categoría:</strong> {{ $item->category->name }}</li>
                  </ul>
              
                  @if (!empty($item->tags))
                    <div>
                      <strong>Tags:</strong><br>
                      @foreach ($item->tags as $tag)
                        <span class="badge bg-primary me-1">{{ $tag }}</span>
                      @endforeach
                    </div>
                  @endif
                </div>
              </div>

        </div>
        
    </div>
    

</div>




@endsection