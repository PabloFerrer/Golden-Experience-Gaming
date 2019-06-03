@extends('layouts.app')

@section('content')

  <table class="py-4 table borderless">

    <thead>
      <tr>
        <th scope="col" colspan=6>Game Catalogue</th>
      </tr>
    </thead>
    @for($i = 0; $i < count($indexgames); $i++)
      @if ($i % 3 == 0)
        <tr class="catalogue-row">
      @endif
          <td class="game-image-container">
            <a href="/game/{{$indexgames[$i]->id}}">
              <img src="http://2.137.103.114/GEG/{{$indexgames[$i]->image_url}}" class="game-image">
            </a>
          </td>
          <td>
            <h3 class="catalogue-title">{{ $indexgames[$i]->name }}</h3>
            <p class="catalogue-synopsis">{{ $indexgames[$i]->synopsis }}</p>
          </td>
      @if ($i % 3 == 2)
        </tr>
      @endif
    @endfor
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
