@extends('layouts.app')

@section('content')

@auth
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 shadow border border-success rounded">
            <div class="">

                <div class="card-body">

                    <p class="text-center">{{ auth()->user()->name }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endauth

<div class="container-lg">
    <div class="row">
        <div class="col-5 bg-primary m-3">Recipe Post</div>
        <div class="col-5 bg-warning m-3">Recipe Post</div>
        <div class="col-5 bg-warning m-3">Recipe Post</div>
        <div class="col-5 bg-primary m-3">Recipe Post</div>
    </div>
</div>
@endsection
