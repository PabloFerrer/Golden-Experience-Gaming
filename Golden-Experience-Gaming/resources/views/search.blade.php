@extends('layouts.app')

@section('content')

<div class="py-4 container-fluid" id="game-search-container">
    <div class="row col-md-6">
			    @if(isset($details))
			    <h3> Results for the query: <strong>"{{ $query }}"</strong></h3>
			    <table class="table table-striped" id="game-search-table">
			        <tbody>
			            @foreach($details as $game)
			            <tr class="gamerow" onclick="window.location='/game/{{$game->id}}';">
			                <td>
                        <img src="http://2.137.103.114/GEG/{{$game->image_url}}"
                             class="game-image">
                      </td>
			                <td>
			                	<div class="row">
                          <strong class="game-search-title">{{$game->name}}</strong>
                        </div>
                        <div class="row">
                          <p class="game-search-synopsis">{{$game->synopsis}}</p>
                        </div>
			                </td>
			            </tr>
			            @endforeach
			        </tbody>
			    </table>
			    @endif
			</div>
      <div class="row col-md-6">
      </div>
</div>


@endsection
