@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 shadow border border-success rounded">
            <div class="">
                <div class="card-body">
                        <p class="text-center text-success fs-3">
                        {{ $recipe->user->name }} Recipe</p>
                </div>
            </div>
        </div>
    </div>
@auth
    @if ($recipe->user->name == auth()->user()->name)
    <div class="row">
        <a class="text-center" href="/recipe/{{ $recipe->id }}/edit"><button class="btn btn-success my-3 col-3">Edit</button></a>
    </div>
    @endif
@endauth
</div>

<div class="container my-4">
    <div class="row justify-content-center text-center">
        <div class="col-4 mx-3 text-start">
            <div class="row">
                <div class="col my-3">
                    <h3 class="text-success fw-bold">Title</h3>
                    <p class="text-capitalize fs-3">{{ $recipe->title }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col my-3">
                <h3 class="text-success fw-bold">Cooking Time</h3>
                    <p class="fs-4">{{ $recipe->cooking_time}} minutes</p>
                </div>
            </div>
            <div class="row">
                <div class="col my-3">
                <h3 class="text-success fw-bold">Ingredients</h3>
                    <div class="my-2">
                        <ul class="text-capitalize" style="list-style-position: inside; ">
                        @foreach($recipe->ingredient as $ingredient)
                            <li>{{ $ingredient->ingredient }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col my-3">
                <h3 class="text-success fw-bold">Categories</h3>
                    <div class="my-2">
                        <ul class="text-capitalize" style="list-style-position: inside; ">
                        @foreach($recipe->category as $category)
                            <a href="/category/{{ $category->category_name }}" class="text-decoration-none text-success">
                                <p>#{{ $category->category_name }}</p>
                            </a>
                        @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-2 mx-3 text-start">
            <img src='{{ asset("customLink/$recipe->pic") }}' alt="Bild på receptet" style="height: 250px; width: 300px">
            <div class="row ">
                <div class="col my-3 text-start">
                <h3 class="text-success fw-bold">Instructions</h3>
                    <div class="my-2">
                        <ol class="text-capitalize" style="list-style-position: inside;">
                        @foreach($instructions as $instructionArray)
                            @foreach($instructionArray->instruction as $text)
                            <li>{{$text}}</li>
                             @endforeach
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
