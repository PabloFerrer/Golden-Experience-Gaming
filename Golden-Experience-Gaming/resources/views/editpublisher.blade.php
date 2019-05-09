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

    <form action="/editpublisher/finished" method="POST">
        {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" value="{{ $publisher->name }}" name="name">
    </div>
    <div class="form-group">
        <label for="price">Email:</label>
        <input type="text" class="form-control" id="email" value="{{ $publisher->email }}" name="email">
    </div>
    <div class="form-group">
        <label for="wallet">Wallet:</label>
        <input type="text" class="form-control" name="wallet" id="wallet" value="{{ $publisher->wallet }}">
    </div>
        <input type="hidden" value="{{$publisher->id}}" id="id" name="id">
    <button type="submit" class="btn btn-default">Edit</button>
    </form>
</div>

@endsection
