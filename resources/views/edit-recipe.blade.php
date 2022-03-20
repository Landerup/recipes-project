@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <h2 class="text-center">Edit recipe</h2>
</div>
        <form action="{{ route('recipe.update', ['recipe' => $recipe]) }}" method="post">
            @CSRF
            @method('PUT')
          <div class="form-group col-4">
            <label for="title">Title</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="title" value="{{ old('title' , $recipe->title) }}">
          </div>
          <div class="form-group col-4">
            <label for="addPic">addPic</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="addPic" value="{{ old('addPic' , $recipe->pic) }}">
          </div>
          <div class="form-group col-2">
            <label for="cooking time">Cooking time</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="cookingTime" value="{{ old('cookingTime' , $recipe->cooking_time) }}">
          </div>

        @if ($errors->any())
            <div class="col-4 my-3 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



          <button type="submit" class="btn btn-dark my-3">Submit</button>
        </form>
      </div>


@endsection