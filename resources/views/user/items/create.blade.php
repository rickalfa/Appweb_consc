@extends('loyouts.app')

@section('content')



<div class="container-fluid">

 <div class="row g-2">

    <div class="col-md-2">
        <x-navsidebar/>
    </div>
 
    <div class="col-md-10 ">
        <h1 class="text-center mb-4 text-light">Crear Nuevo Item</h1>

        <!-- START FORM CREATE ITEM--->
        <div class="container-fluid">

            <form action="{{ route('items.store')}}" method="POST" enctype="multipart/form-data" class="text-light m-4">
                @csrf
            
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="title" class="form-label">Título <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="price" class="form-label">Precio <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                    @error('price')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="tags" class="form-label">Etiquetas (separadas por comas)</label>
                    <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags') }}">
                    <small class="form-text text-muted">Introduce las etiquetas separadas por comas (ej: electrónica, nuevo, oferta).</small>
                    @error('tags')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="item_type" class="form-label">Tipo de Contenido <span class="text-danger">*</span></label>
                    <select class="form-select" id="item_type" name="item_type" required>
                        <option value="">Seleccionar tipo</option>
                        <option value="text" {{ old('item_type') == 'text' ? 'selected' : '' }}>Texto</option>
                        <option value="image" {{ old('item_type') == 'image' ? 'selected' : '' }}>Imagen</option>
                        <option value="archive" {{ old('item_type') == 'archive' ? 'selected' : '' }}>Archivo</option>
                        </select>
                    @error('item_type')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3" id="text_content_group" style="{{ old('item_type') == 'text' ? '' : 'display: none;' }}">
                    <label for="text_content" class="form-label">Contenido de Texto</label>
                    <textarea class="form-control" id="text_content" name="text_content">{{ old('text_content') }}</textarea>
                    @error('text_content')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            
            
            
             <!--
                <div class="mb-3" id="image_upload_group" style="{{ old('item_type') == 'image' ? '' : 'display: none;' }}">
                    <label for="image_upload" class="form-label">Subir Imagen</label>
                    <input type="file" class="form-control" id="image_upload" name="image_upload" accept="image/*">
                    @error('image_upload')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>   
                
                <div class="mb-3" id="archive_upload_group" style="{{ old('item_type') == 'archive' ? '' : 'display: none;' }}">
                    <label for="archive_upload" class="form-label">Subir Archivo</label>
                    <input type="file" class="form-control" id="archive_upload" name="archive_upload">
                    @error('archive_upload')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
             -->
            
                <div class="mb-3 form-check">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" {{ old('is_featured') ? 'checked' : '' }} value="1">
                    <label class="form-check-label" for="is_featured">Destacado</label>
                    @error('is_featured')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3 form-check">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }} value="1">
                    <label class="form-check-label" for="is_active">Activo</label>
                    @error('is_active')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoría <span class="text-danger">*</span></label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="">Seleccionar categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            
                <button type="submit" class="btn btn-primary">Crear Ítem</button>
            </form>
            

          </div>

         </div><!-- END FORM CREATE ITEM--->

    </div>
</div>




@endsection

