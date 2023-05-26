@extends('layouts/admin')

@section('content')
    <div class="container">
        <h1 class="my-3">Modifica il tuo progetto</h1>

        <form action="{{route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data" class="py-5">
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
              <label class="d-block" for="type_id">Tipo: </label>
              <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">
                <option value="">Nessuno</option>
                @foreach ($types as $type)
                <option value="{{$type->id}}" {{$type->id == old('type_id', $project->type_id) ? 'selected' : ''}}>{{$type->name}}</option>   
                @endforeach
              </select>
              @error('type_id')
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

            <div class="mb-3 form-group">
              <h4>Technologies</h4>
        
              @foreach($technologies as $technology)

              
              <div class="form-check">
                <input type="checkbox" id="technology-{{$technology->id}}" name="technologies[]" value="{{$technology->id}}"  @checked($project->technologies->contains($technology))>
                <label for="technolgy-{{$technology->id}}">{{$technology->name}}</label>
              </div>
              @endforeach
        
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
              <label for="link_image">Immagine di copertina</label>
              <input type="file" id="link_image" name="link_image" class="form-control @error('link_image') is-invalid @enderror">
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