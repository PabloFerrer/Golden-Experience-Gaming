@extends('layouts.app')

@section('content')
<div class="py-4">

    @if (session('notification'))
    <div class="alert alert-success">
    {{ session('notification') }}
    </div>
    @endif


    @if (count($errors) > 0)
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
    @endif
    <form action="/creategame/finished" method="POST" role="form"
          enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="row">
        <div class="form-group col-2">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name"
                   value="{{ old('name')}}" name="name">
        </div>
        <div class="form-group col-6">
            <label for="synopsis">Synopsis:</label>
            <input type="text" class="form-control" id="synopsis"
                   value="{{ old('synopsis')}}" name="synopsis">
        </div>
        <div class="form-group col-2">
            <label for="price"><strong>Price:</strong></label>
            <input type="int" class="form-control" id="price"
                   value="{{ old('price')}}" name="price">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-8">
            <label for="description"><strong>Description:</strong></label>
            <textarea type="text" class="form-control" name="description"
                      id="description" value="{{ old('description')}}">
            </textarea>
        </div>
          <div class="form-group col-4">
            <p><strong>Genres:</strong></p>
            <div class="container">
            @foreach($genres as $genre)
              <span class="genre-list">
                <label>{{$genre->name}}</label>
                <input type="checkbox" name="genres[]" value="{{$genre->id}}">
              </span>
            @endforeach
            </div>
        </div>
      </div>
      <label for="cover"><strong>Cover Image:</strong></label>
      <input type="file" class="btn btn-default" name="cover" value=""
             accept="image/jpeg, image/png"><br>
      <label for="thumbnail"><strong>Icon:</strong></label>
      <input type="file" class="btn btn-default" name="thumbnail" value=""
             accept="image/jpeg, image/png"><br>
      <div class="row">
        <div class="col-1 pt-2">
            <button type="submit" class="btn btn-default submit-game-button">Submit</button>
        </div>
      </div>
    </form>

</div>
@endsection
