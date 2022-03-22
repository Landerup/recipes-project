@extends('layouts.app')

@section('content')

<div class="container-lg">
    <div class="">
        <h2 class="text-center text-success">10 Random Recipes</h2>
    </div>
    <div class="row justify-content-center">
        @foreach($recipes as $recipe)
        <div class="col-5 m-3 text-center">
            <a href="/recipe/{{ $recipe->id }}">
                <img src='{{ asset("customLink/$recipe->pic") }}' alt="Bild på receptet" style="height: 150px; width: 150px">
             </a>
            <a class="text-decoration-none" href="/recipe/{{ $recipe->id }}">
                <h4 class="text-success text-capitalize">{{ $recipe->title }}</h4>
            </a>
            <p>{{ $recipe->cooking_time }} minutes</p>
        </div>
        @endforeach
    </div>
</div>
@endsection