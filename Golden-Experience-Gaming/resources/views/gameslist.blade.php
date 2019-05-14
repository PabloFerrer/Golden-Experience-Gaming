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


    <h3>Here is the list of all the games in the platform:</h3>

    <table class="table table-striped textcolor" id="game-search-table">
    <tbody>
        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>PRICE</td>
            <td>DESCRIPTION</td>
            <td>SYNOPSIS</td>
            <td>PUBLISHER</td>
        </tr>
        @foreach($games as $game)
        <tr class="">
            <td>
            <p style="color:#FF0000" >{{ $game->id }}</p>
            </td>
            <td>
            <p style="color:#FF0000" >{{ $game->name }}</p>
            </td>
            <td>
            <p style="color:#FF0000" >{{ $game->price }}</p>
            </td>
            <td>
            <p style="color:#FF0000" >{{ $game->description }}</p>
            </td>                        
            <td>
            <p style="color:#FF0000" >{{ $game->synopsis }}</p>
            </td>        
            <td>
            <p style="color:#FF0000" >{{ $game->publisher_id }}: {{$game->publisher->name}}</p>
            </td>            
            <td>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
