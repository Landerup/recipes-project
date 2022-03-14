@extends('layouts.app')

@section('content')

@auth

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 shadow border border-success rounded">
            <div class="">

                <div class="card-body">

                        <p class="text-center">{{ auth()->user()->name }}</p>
                        <button class="btn btn-primary">Edita</button>


                </div>
            </div>
        </div>
    </div>
</div>
@endauth

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-4 mx-3">
            <div class="row">
                <div class="col my-3 bg-primary">Title</div>
            </div>
            <div class="row">
                <div class="co my-3 bg-info">Ingredients
                    <div class="my-2 bg-success">
                        <ul>
                            <li>Banana</li>
                            <li>Äpple</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col my-3 bg-danger">Instructions
                    <div class="my-2 bg-success">
                        <ol>
                            <li>Test</li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-7 mx-3 bg-warning">Picture
            <div class="col my-3 bg-success">Rating</div>
        </div>
    </div>
</div>
@endsection
