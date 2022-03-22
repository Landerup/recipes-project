@extends('layouts.app')

@section('content')

@auth
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 shadow border border-success rounded">
            <div class="">

                <div class="card-body">

                    <p class="text-center text-success fs-3">{{ auth()->user()->name }} Profile</p>

                </div>
            </div>
        </div>
    </div>
        <div class="row">
        <a class="text-center" href="/recipe/create"><button class="btn btn-success my-3 col-3">Add recipe</button></a>
        </div>
</div>
@endauth

<div class="container-lg">
    <div class="row justify-content-center">
        @foreach($recipes as $recipe)
        <div class="col-5 m-3 text-center">
        <a href="/recipe/{{ $recipe->id }}">
                <img src='{{ asset("customLink/$recipe->pic") }}' alt="Bild på receptet" style="height: 150px; width: 150px">
        </a>
            <a class="text-decoration-none"href="/recipe/{{ $recipe->id }}">
                <h4 class="text-success text-capitalize">{{ $recipe->title }}</h4>
            </a>
            <p>{{ $recipe->cooking_time }} minutes</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
