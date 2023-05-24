@extends('layouts/admin')

@section('content')
<div class="container">
    <h1 class="my-3">Modifica tecnologia</h1>

    <form action="{{route('admin.technologies.update', $technology)}}" method="POST" class="py-5">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
          <label for="name">Nome</label>
          <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{old('name', $technology->name)}}">
          @error('name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        
    
        
    
        <div class="mb-3">
            <label for="color">Descrizione</label>
            <input class="form-control @error('color') is-invalid @enderror" name="color" id="color" value="{{old('color', $technology->color)}}">
            @error('color')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>
    
    
        <button type="submit" class="btn btn-primary">Modifica</button>


    
    </form>
</div>    
@endsection