@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <h2 class="text-center">Add new recipe</h2>
</div>
        <form action="{{ route('recipe.store') }}" method="post">
            @CSRF
          <div class="form-group col-4">
            <label for="title">Title</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="title">
          </div>
          <div class="form-group col-4">
            <label for="addPic">addPic</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="addPic">
          </div>
          <div class="form-group col-2">
            <label for="cooking time">Cooking time</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="cookingTime">
          </div>
            <div>
          <div class="form-group col-4">
             <label for="ingredients">Ingredients</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="ingredient0">
            <input type="text" class="form-control my-2" placeholder="Write here" name="ingredient1">
            <input type="text" class="form-control my-2" placeholder="Write here" name="ingredient2">
          </div>
          <div>
          <div class="form-group col-4">
             <label for="instructions">Instructions</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="instructionOne">
            <input type="text" class="form-control my-2" placeholder="Write here" name="instructionTwo">
            <input type="text" class="form-control my-2" placeholder="Write here" name="instructionThree">
          </div>

          <button type="submit" class="btn btn-dark my-3">Submit</button>
        </form>
      </div>


@endsection