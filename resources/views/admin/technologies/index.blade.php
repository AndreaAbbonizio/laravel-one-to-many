@extends('layouts/admin')


@section('content')

<div class="container">
    <h1 class="my-3 text-center">
        Tecnologie dei progetti
    </h1>

    <table class="table table-striped">

        <thead>
          <th>Nome</th>
          <th>Colore</th>
          <th>Slug</th>
          <th></th>
        </thead>
  
        <tbody>
  
          @foreach($technologies as $technology)
          
            <tr>
              <td>{{$technology->name}}</td>
              <td style="background-color: {{$technology->color}}">{{$technology->color}}</td>
              <td>{{$technology->slug}}</td>
              <td><a href="{{route('admin.technologies.show', $technology)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
            </tr>
  
          @endforeach
  
        </tbody>
  
      </table>


      <div class="my-5">
        <div class="new-project">
            <a href="{{route('admin.technologies.create')}}">Aggiungi nuova tecnologia</a>
        </div>
    </div>
</div>
    
@endsection