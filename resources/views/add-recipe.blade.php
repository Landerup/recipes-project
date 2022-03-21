@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <h2 class="text-center">Add new recipe</h2>
</div>
        <form action="{{ route('recipe.store') }}" method="post" enctype="multipart/form-data">
            @CSRF
          <div class="form-group col-4">
            <label for="title">Title</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="title" value="{{ old('title') }}">
          </div>
          <div class="form-group col-4">
            <label for="addPic">addPic</label>
            <input type="file" class="form-control my-2" placeholder="Choose file" name="addPic" value="{{ old('addPic') }}">
          </div>
          <div class="form-group col-2">
            <label for="cooking time">Cooking time (minutes)</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="cookingTime" value="{{ old('cookingTime') }}">
          </div>
            <div>
          <div class="form-group col-4">
             <label for="ingredients">Ingredients</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="ingredient[]" value="{{ old('ingredient[]') }}">
            <input type="text" class="form-control my-2" placeholder="Write here" name="ingredient[]" value="{{ old('ingredient[]') }}">
            <input type="text" class="form-control my-2" placeholder="Write here" name="ingredient[]" value="{{ old('ingredient[]') }}">
            <button class="bg-success" id="addIngredient">+</button>
            <button class="bg-danger" id="removeIngredient">-</button>
          </div>
          <div>
          <div class="form-group col-4">
             <label for="instructions">Instructions</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="instruction[]">
            <input type="text" class="form-control my-2" placeholder="Write here" name="instruction[]">
            <input type="text" class="form-control my-2" placeholder="Write here" name="instruction[]">
            <button class="bg-success" id="addInstruction">+</button>
            <button class="bg-danger" id="removeInstruction">-</button>
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