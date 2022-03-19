@extends('layouts.app')

@section('content')
<div class="container-lg">
    <div class="row">
        @foreach($recipes as $recipe) 
        <div class="col-5 m-3">
            <a href="/recipe/{{ $recipe->id }}"><h2>{{ $recipe->title }}</h2></a>
            <p>{{ $recipe->cooking_time }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection