@extends('layouts.app')

@section('content')

  <table class="py-4 table borderless">

    <thead>
      <tr>
        <th scope="col" colspan=6>Game Catalogue</th>
      </tr>
    </thead>
    @foreach ($indexgames as $game)
      @if ($game->id % 3 == 1)
        <tr class="catalogue-row">
      @endif
          <td class="game-image-container">
            <a href="/game/{{$game->id}}">
              <img src="{{env('IMAGE_SERVER')}}{{$game->image_url}}" class="game-image">
            </a>
          </td>
          <td>
            <h3 class="catalogue-title">{{ $game->name }}</h3>
            <p class="catalogue-synopsis">{{ $game->synopsis }}</p>
          </td>
      @if ($game->id % 3 == 0)
        </tr>
      @endif
    @endforeach
  </table>

    <!-- <div class="row justify-content-center">
        <div class="col-md-4">

      @isset( $indexgames[0] )
				<a href="/game/{{$indexgames[0]->id}}">{{ $indexgames[0]->name }}</a>

			@else
				NO HAY JUEGO
			@endisset
        </div>
        <div class="col-md-4">

      @isset( $indexgames[1] )

				<a href="/game/{{$indexgames[1]->id}}">{{ $indexgames[1]->name }}</a>

			@else
				NO HAY JUEGO
			@endisset
			<br/>
			<br/>
			<img src="{{asset('img/Fallout76.png')}}" width="80" height="80" >
        </div>
    </div> -->
@endsection
