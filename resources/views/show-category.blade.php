@extends('layouts.app')

@section('content')

<div class="container-lg">
    <div class="">
    @foreach($category as $singlecategory)
        <h2 class="text-center text-success">Category {{ $singlecategory->category_name }}</h2>
    @endforeach
    </div>
    <div class="row justify-content-center">
    @foreach($singlecategory->recipe as $recipe)
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