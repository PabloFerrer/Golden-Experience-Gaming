@extends('layouts.app')

@section('content')
    
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

    <form action="/editgametext" method="GET">
    <div>Elija el juego que desea editar</div>
    <select name="games" id="games">
        @foreach($games as $game)
            <option value="{{ $game->id }}">{{ $game->name }}</option>
        @endforeach
    </select>
    <br>
    <button type="submit" class="btn btn-default">Editar</button>
    </form >
@endsection
