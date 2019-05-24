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

    <form action="/editgametext/finished" method="POST">
        {{ csrf_field() }}
      <div class="row">
        <div class="form-group col-2">
            <label for="name"><strong>Name:</strong></label>
            <input type="text" class="form-control" id="name"
                   value="{{ $game->name }}" name="name">
        </div>
        <div class="form-group col-6">
            <label for="synopsis"><strong>Synopsis:</strong></label>
            <input type="text" class="form-control" id="synopsis"
                    value="{{ $game->synopsis }}" name="synopsis">
        </div>
        <div class="form-group col-2">
            <label for="price"><strong>Price:</strong></label>
            <input type="int" class="form-control" id="price"
                   value="{{ $game->price }}" name="price">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-8">
            <label for="description"><strong>Description:</strong></label>
            <textarea type="text" class="form-control" name="description"
                      id="description" value="">{{ $game->description }}
            </textarea>
        </div>
      </div>


    <input type="hidden" value="{{$game->id}}" id="id" name="id">
    <div class="form-group col-4">
      <p><strong>Genres:</strong></p>
      <div class="container">
      @foreach($genres as $genre)
        <span class="genre-list">
          <label>{{$genre->name}}</label>
          @if(in_array($genre->id,$selectedgenres))
          <input type="checkbox" name="genres[]" value="{{$genre->id}}" checked>
          @else
          <input type="checkbox" name="genres[]" value="{{$genre->id}}">

          @endif
        </span>
      @endforeach
      </div>
    </div>

    <div class="row">
      <div class="col-1 pt-2">
          <button type="submit" class="btn btn-default submit-game-button">Edit</button>
      </div>
    </div>
    </form>
</div>

@endsection
