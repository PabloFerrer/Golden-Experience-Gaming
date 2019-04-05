@extends('layouts.app')

@section('content')
@isset( $specificgame )
            <div class="gamepage">
            	<div class="row">
                        <div class="col-md-3">
                              <img src="{{asset('img/Fallout76.png')}}"></a> 
                        </div> 
            		<div class="col-md-2 gametitle">
                        <p>{{ $specificgame->name }}</p>
                        <p>Genero</p>
            		</div>
            		<div class="col-md-1 gametitle"><p>{{ $specificgame->price }}</p></div>	
            		<div class="col-md-2">
                        <form action="/game/{{$specificgame->id}}/add" method="POST">
                              {{ csrf_field() }}
                              <input type="hidden" name="authid" id="authid" value=" {{ Auth::user()->id }}">
                              <input type="hidden" name="gameid" id="gameid" value=" {{ $specificgame->id }}">
                              <button type="submit" class="btn addtocart">Añadir al carrito</button>
                        </form>
            		
            		</div>


            	</div>

            </div>
@else
      El juego no está en la base de datos
@endisset
@endsection
