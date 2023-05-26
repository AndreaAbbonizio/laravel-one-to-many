@extends('layouts/admin')

@section('content')
<div class="container">

    <h1 class="my-4 text-center">
        Tecnologia: {{$technology->name}}
    </h1>

    <div class="card text-center">
        
        <div class="card-header">
            <strong>Tecnologia</strong>
        </div>
        <div class="card-body">
            <h5 class="card-title"> {{$technology->name}} </h5>
            <div class="badge rounded-pill mb-2 mx-1" style="background-color: {{$technology->color}}">{{$technology->name}}</div>
            <br>
            <a href="{{route('admin.technologies.index')}}" class="btn btn-primary">Torna indietro</a>
        </div>
        <div class="card-footer text-body-secondary">
            <pre>({{$technology->slug}}) </pre>
        </div>
    </div>


    <div class="d-flex justify-content-around my-5">
        <a href="{{route('admin.technologies.edit', $technology)}}" class="btn btn-primary">Modifica la tecnologia</a>
        
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Elimina
        </button>
    </div> 

      
</div>
    
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina la teccnologia</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sei sicuro di voler eliminare la tecnologia "{{$technology->name}}"
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <form action="{{route('admin.technologies.destroy', $technology)}}" method="POST">
            @csrf
            @method('DELETE')
          
            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </div>
      </div>
    </div>
</div>
    

@endsection