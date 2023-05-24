@extends('layouts/admin')


@section('content')
    <h1 class="my-5 text-center">I tuoi progetti</h1>

    <div class="container container-cards mb-5">
        @foreach ($projects as $project)
            <div class="card text-bg-dark">
                <div class="card-body">
                    <h5 class="card-title"> {{$project->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Developed by: {{$project->developers}}</h6>
                    <div class="d-flex flex-wrap py-3">
                        @foreach($project->technologies as $technology)
                          <span class="badge rounded-pill mb-2 mx-1" style="background-color: {{$technology->color}}">{{$technology->name}}</span>
                        @endforeach
                    </div>
                    <small>Tipo: <strong>{{$project->type->name ?? 'nessun tipo'}}</strong></small>  
                    <p class="card-text">{{$project->description}}</p>
                    <a href=" {{route('admin.projects.show', $project->slug)}} " class="d-inline-block mb-2 text-decoration-none btn btn-primary">Card link</a>
                    <a href=" {{route('admin.')}} " class="d-inline-block text-decoration-none btn btn-primary">Torna alla Dashboard</a>
                </div>
            </div>
            
            
        @endforeach
    </div>

    <div class="container mb-5">
        <div class="new-project">
            <a href="{{route('admin.projects.create')}}">Aggiungi nuovo progetto</a>
        </div>
    </div>

@endsection