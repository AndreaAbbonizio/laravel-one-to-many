@extends('layouts/admin')

@section('content')
    <div class="container mt-3">

      <div class="text-center">
        <img src="{{ asset('storage/' . $project->link_image)}}" alt="Immagine progetto" class="w-25">
      </div>

      
      <h1>{{$project->title}}</h1>

      <small>Developed by: {{$project->developers}}</small>

      <div class="d-flex py-3">
        @foreach($project->technologies as $technology)
          <span class="badge rounded-pill mx-1" style="background-color: {{$technology->color}}">{{$technology->name}}</span>
        @endforeach
      </div>

      <br>

      <small>Tipo: {{$project->type->name ?? 'nessun tipo'}}</small>

      <hr>

      <h2>Descrizione progetto:</h2>

      <div class="main-project">
          <p>
              {{$project->description}}
          </p>
  
  
          

      </div>

      
      <div class="container-link mb-5">
          <strong>
              Visualizza la repository su GitHub
          </strong>
  
          <a href="#">Link qui <i class="fa-brands fa-github"></i></a>
      </div>

      
      <div class="d-flex justify-content-between align-items-center mb-3">
          
          <div class="new-project">
              <a href="{{route('admin.projects.edit', $project)}}">Modifica progetto</a>
          </div>
          
    
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina
          </button>
    
          
    
      </div>
    </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il progetto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sei sicuro di voler eliminare il progetto "{{$project->title}}"
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
            @csrf
            @method('DELETE')
          
            <button type="submit" class="btn btn-danger">Elimina il progetto</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection


