@extends('layouts/admin')

@section('content')
    <div class="container mt-3">
        <h1>{{$project->title}}</h1>

        <small>Developed by: {{$project->developers}}</small>

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
            
      
            <div id="delete-button" class="btn btn-danger fw-bold">Cancella progetto</div>
      
            
      
        </div>
    </div>

    <div id="delete-modal" class="hidden">

        <div id="delete-modal-inner">
          <p>
            Sei sicuro di voler eliminare il progetto?
          </p>
          <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        
          <button id="delete-modal-close" class="btn btn-secondary">Chiudi</button>
      
        </div>
    </div>
@endsection


@section('script')
<script type="text/javascript">

    let deleteModalEl = document.getElementById('delete-modal');
    
    document.getElementById('delete-button').onclick = function() {
      deleteModalEl.classList.remove('hidden');
    };
    
    
    document.getElementById('delete-modal-close').onclick = function () {
      deleteModalEl.classList.add('hidden');
    }
    

</script>
@endsection