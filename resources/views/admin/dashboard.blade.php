@extends('layouts/admin')


@section('content')
    <div class="container">
        <h1 class="mb-3">Benvenuto nella tua dashboard</h1>

        <div class="container-links">
            <a href="{{route('admin.projects.index')}}">Link per accedere ai tuoi progetti personali</a>
        </div>
    </div>
@endsection