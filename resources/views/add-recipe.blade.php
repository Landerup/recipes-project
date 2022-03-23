@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <h2 class="text-center text-success">Add new recipe</h2>
</div>
  <div class="row">
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
            </div>
            <div class="container">
            <div class="row">
          <div class="form-group col-3" id="ingredientDiv">
             <label for="ingredients">Ingredients</label>
             <button type="button" class="bg-success" id="addIngredient">+</button>
            <button type="button" class="bg-danger" id="removeIngredient">-</button>
            <input type="text" id="test" class="form-control my-2" placeholder="Write here" name="ingredient[]" value="{{ old('ingredient.0') }}">
            <input type="text" id="test" class="form-control my-2" placeholder="Write here" name="ingredient[]" value="{{ old('ingredient.1') }}">
            <input type="text" id="test" class="form-control my-2" placeholder="Write here" name="ingredient[]" value="{{ old('ingredient.2') }}">
          </div>




          <div class="form-group col-3">
             <label for="instructions">Instructions</label>
             <button type="button" class="bg-success" id="addInstruction">+</button>
            <button type="button" class="bg-danger" id="removeInstruction">-</button>
            <input type="text" class="form-control my-2" placeholder="Write here" name="instruction[]" value="{{ old('instruction.0') }}">
            <input type="text" class="form-control my-2" placeholder="Write here" name="instruction[]" value="{{ old('instruction.1') }}">
            <input type="text" class="form-control my-2" placeholder="Write here" name="instruction[]" value="{{ old('instruction.2') }}">

          </div>

          <div class="form-group col-3">
             <label for="instructions">Categories</label>
             <button type="button" class="bg-success" id="addCategory">+</button>
            <button type="button" class="bg-danger" id="removeCategory">-</button>
            <input type="text" class="form-control my-2" placeholder="Write here" name="category[]" value="{{ old('category.0') }}">
            <input type="text" class="form-control my-2" placeholder="Write here" name="category[]" value="{{ old('category.1') }}">
            <input type="text" class="form-control my-2" placeholder="Write here" name="category[]" value="{{ old('category.2') }}">

          </div>
          </div>
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

          <button type="submit" class="btn btn-success my-3">Submit</button>
        </form>
      </div>


@endsection