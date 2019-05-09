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
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" value="{{ $game->name }}" name="name">
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="int" class="form-control" id="price" value="{{ $game->price }}" name="price">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control" name="description" id="description" value="{{ $game->description }}">
    </div>
    <div class="form-group">
        <label for="synopsis">Synopsis:</label>
        <input type="text" class="form-control" id="synopsis" value="{{ $game->synopsis }}" name="synopsis">
    </div>
    


     <!--<div class="form-group">
    @foreach($genres as $genre) CUANDO PUEDA LO ARREGLO, FUCKING BULLSHIT
        <input type="checkbox" name="genres[]" value="{{$genre->id}}" > <label>{{$genre->name}}</label>
    @endforeach
    </div>-->
        <input type="hidden" value="{{$game->id}}" id="id" name="id">
    <button type="submit" class="btn btn-default">Edit</button>
    </form>
</div>

@endsection
