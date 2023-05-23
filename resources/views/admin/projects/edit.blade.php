@extends('layouts/admin')

@section('content')
    <div class="container">
        <h1 class="my-3">Modifica il tuo progetto</h1>

        <form action="{{route('admin.projects.update', $project)}}" method="POST" class="py-5">
            @csrf
            @method('PUT')


            <div class="mb-3">
              <label for="title">Titolo</label>
              <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{old('title') ?? $project->title}}">
              @error('title')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
        
            <div class="mb-3">
              <label for="description">Descrizione</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{old('description') ?? $project->description}}</textarea>
              @error('description')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
        
            <div class="mb-3">
              <label for="link_repository">Link repository</label>
              <input class="form-control @error('link_repository') is-invalid @enderror" type="text" name="link_repository" id="link_repository"  value="{{old('link_repository') ?? $project->link_repository}}">
              @error('link_repository')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
        
            <div class="mb-3">
              <label for="link_image">Link immagine</label>
              <input class="form-control @error('link_image') is-invalid @enderror" type="text" name="link_image" id="link_image"  value="{{old('link_image') ?? $project->link_image}}">
              @error('link_image')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
        
            <div class="mb-3">
              <label for="developers">Developed by:</label>
              <input class="form-control @error('developers') is-invalid @enderror" type="text" name="developers" id="developers"  value="{{old('developers') ?? $project->developers}}">
              @error('developers')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
        
        
            <button type="submit" class="btn btn-primary">Modifica</button>
        
          </form>
    </div>
@endsection