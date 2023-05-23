@extends('layouts/admin')

@section('content')
    <div class="container">
        <h1 class="my-3 text-center">
            Tipo di progetto
        </h1>

        <table class="table table-striped">

            <thead>
              <th>Nome</th>
              <th>Descrizione</th>
              <th>Slug</th>
              <th>N° progetti</th>
              <th></th>
            </thead>
      
            <tbody>
      
              @foreach($types as $type)
              
                <tr>
                  <td>{{$type->name}}</td>
                  <td>{{$type->description}}</td>
                  <td>{{$type->slug}}</td>
                  <td>{{ count($type->projects) }}</td>
                  <td><a href="{{route('admin.types.show', $type)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
                </tr>
      
              @endforeach
      
            </tbody>
      
          </table>


          <div class="my-5">
            <div class="new-project">
                <a href="{{route('admin.types.create')}}">Aggiungi nuovo tipo</a>
            </div>
        </div>
    </div>
@endsection