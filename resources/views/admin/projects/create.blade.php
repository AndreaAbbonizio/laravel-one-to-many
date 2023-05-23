@extends('layouts/admin')

@section('content')
    <div class="container">
        <h1 class="my-3">Aggiungi un nuovo progetto</h1>

        <form action="{{route('admin.projects.store')}}" method="POST" class="py-5">
            @csrf
        
            <div class="mb-3">
              <label for="title">Titolo</label>
              <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{old('title')}}">
              @error('title')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
        
            <div class="mb-3">
              <label for="description">Descrizione</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{old('description')}}</textarea>
              @error('description')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
        
            <div class="mb-3">
              <label for="link_repository">Link repository</label>
              <input class="form-control @error('link_repository') is-invalid @enderror" type="text" name="link_repository" id="link_repository"  value="{{old('link_repository')}}">
              @error('link_repository')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
        
            <div class="mb-3">
              <label for="link_image">Link immagine</label>
              <input class="form-control @error('link_image') is-invalid @enderror" type="text" name="link_image" id="link_image"  value="{{old('link_image')}}">
              @error('link_image')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
        
            <div class="mb-3">
              <label for="developers">Developed by:</label>
              <input class="form-control @error('developers') is-invalid @enderror" type="text" name="developers" id="developers"  value="{{old('developers')}}">
              @error('developers')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
        
        
            <button type="submit" class="btn btn-primary">Aggiungi</button>
        
          </form>
    </div>
@endsection