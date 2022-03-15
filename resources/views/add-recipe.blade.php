@extends('layouts.app')

@section('content')
<div class="container">
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
            <div>
          <div class="form-group col-4">
             <label for="ingredients">Ingredients</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="ingredients0">
            <input type="text" class="form-control my-2" placeholder="Write here" name="ingredients1">
            <input type="text" class="form-control my-2" placeholder="Write here" name="ingredients2">
          </div>
          <div>
          <div class="form-group col-4">
             <label for="instructions">Instructions</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="instructions0">
            <input type="text" class="form-control my-2" placeholder="Write here" name="instructions1">
            <input type="text" class="form-control my-2" placeholder="Write here" name="instructions2">
          </div>

          <button type="submit" class="btn btn-dark my-3">Submit</button>
        </form>
      </div>


@endsection