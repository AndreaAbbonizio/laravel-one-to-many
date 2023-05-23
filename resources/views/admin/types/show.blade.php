@extends('layouts/admin')


@section('content')

    <div class="container">

        <h1 class="my-4 text-center">
            Tipo: {{$type->name}}
        </h1>

        <div class="card text-center">
            
            <div class="card-header">
                <strong>TIPO</strong>
            </div>
            <div class="card-body">
                <h5 class="card-title"> {{$type->name}} </h5>
                <p class="card-text mb-2">{{$type->description}}</p>
                <p>Progetti di questo tipo: <strong>{{ count($type->projects) }}</strong></p>
                <a href="{{route('admin.types.index')}}" class="btn btn-primary">Torna indietro</a>
            </div>
            <div class="card-footer text-body-secondary">
                <pre>({{$type->slug}}) </pre>
            </div>
        </div>


        <div class="d-flex justify-content-around my-5">
            <a href="{{route('admin.types.edit', $type)}}" class="btn btn-primary">Modifica il tipo</a>
            
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Elimina
            </button>
        </div> 

          
    </div>
        
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il tipo</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Sei sicuro di voler eliminare il tipo "{{$type->name}}"
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
              <form action="{{route('admin.types.destroy', $type)}}" method="POST">
                @csrf
                @method('DELETE')
              
                <button type="submit" class="btn btn-danger">Elimina il tipo</button>
              </form>
            </div>
          </div>
        </div>
    </div>
        
    
@endsection