@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 shadow border border-success rounded">
            <div class="">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        <p class="text-center">{{ auth()->user()->name }}</p>
                        <button class="btn btn-primary">Edit</button>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</div>
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
                            <li></li>
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
