@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 shadow border border-success rounded">
            <div class="">
                <div class="card-body">
                        <p class="text-center">{{ $recipe->user->name }}</p>
                </div>
            </div>
        </div>
    </div>
@auth
    @if ($recipe->user->name == auth()->user()->name)
    <div class="row">
        <a class="text-center" href="/recipe/{{ $recipe->id }}/edit"><button class="btn btn-primary my-3 col-3">Edit</button></a>
    </div>
    @endif
@endauth
</div>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-4 mx-3">
            <div class="row">
                <div class="col my-3">Title : {{ $recipe->title }}</div>
            </div>
            <div class="row">
                <div class="col my-3">Cooking time : {{ $recipe->cooking_time}}</div>
            </div>
            <div class="row">
                <div class="col my-3">Ingredients
                    <div class="my-2">
                        <ul>
                            <li>Banana</li>
                            <li>Äpple</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col my-3">Instructions
                    <div class="my-2">
                        <ol>
                            <li>Test</li>
                            <li>Hej</li>
                            <li></li>
                            <li></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-7 mx-3">Picture
            <div class="col my-3">Rating</div>
        </div>
    </div>
</div>
@endsection
