@extends('layouts.app')

@section('content')
<div class="container-lg">
    <div class="row">
        @foreach($recipes as $recipe) 
        <div class="col-5 bg-primary m-3">
            <h2>{{ $recipe->title }}</h2>
            <p>{{ $recipe->cooking_time }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection