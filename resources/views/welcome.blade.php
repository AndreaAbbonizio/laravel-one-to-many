@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container">
        <h1>Boolfolio</h1>
        <h2>Il tuo Portfolio per caricare e visualizzare progetti</h2>
    </div>
</div>

<div class="content">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
        <a href=" {{route('admin.')}} ">Il tuo Portfolio</a>
    </div>
</div>
@endsection