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
    <form action="/creategame/finished" method="POST">
        {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" value="{{ old('name')}}" name="name">
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="int" class="form-control" id="price" value="{{ old('price')}}" name="price">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control" name="description" id="description" value="{{ old('description')}}">
    </div>
    <div class="form-group">
        <label for="synopsis">Synopsis:</label>
        <input type="text" class="form-control" id="synopsis" value="{{ old('synopsis')}}" name="synopsis">
    </div>
    <div class="form-group">
    @foreach($genres as $genre)
        <input type="checkbox" name="genres[]" value="{{$genre->id}}"> <label>{{$genre->name}}</label>
    @endforeach
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    </form>

</div>
@endsection
