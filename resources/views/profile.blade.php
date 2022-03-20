@extends('layouts.app')

@section('content')

@auth
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 shadow border border-success rounded">
            <div class="">

                <div class="card-body">

                    <p class="text-center">{{ auth()->user()->name }} Profile</p>

                </div>
            </div>
        </div>
    </div>
        <div class="row">
        <a class="text-center" href="/recipe/create"><button class="btn btn-primary my-3 col-3">Add recipe</button></a>
        </div>
</div>
@endauth

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
