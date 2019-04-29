@extends('layouts.app')

@section('content')

    @foreach ($usergames as $game)
      <a href="/game/{{$game->id}}"><p>{{$game->name}}</p></a>
    @endforeach

@endsection
