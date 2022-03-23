@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <h2 class="text-center text-success">Edit recipe</h2>
</div>
<div class="row">
        <form action="{{ route('recipe.update', ['recipe' => $recipe]) }}" method="post" enctype="multipart/form-data">
            @CSRF
            @method('PUT')
          <div class="form-group col-4">
            <label for="title">Title</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="title" value="{{ old('title' , $recipe->title) }}">
          </div>
          <div class="form-group col-4">
          <label for="addPic">addPic</label>
            <input type="file" class="form-control my-2" placeholder="Choose file" name="addPic" value="{{ old('addPic') }}">
          </div>
          <div class="form-group col-2">
            <label for="cooking time">Cooking time</label>
            <input type="text" class="form-control my-2" placeholder="Write here" name="cookingTime" value="{{ old('cookingTime' , $recipe->cooking_time) }}">
          </div>
          </div>

          <h2>DU KAN INTE EDITERA DET ANDRA</h2>

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