@extends('layouts.app')

@section('content')

<div class="container-lg">
    <div class="">
        <h2 class="text-center text-success">All categories</h2>
    </div>
    <div class="row justify-content-center text-center">
        @foreach($categories as $category)

            <ul class="text-capitalize" style="list-style-position: inside;">
           <li> <a href="/category/{{ $category->category_name }}" class="text-center text-success">
            {{ $category->category_name }}
             </a>
             </li>
             </ul>

        @endforeach
    </div>
</div>
@endsection