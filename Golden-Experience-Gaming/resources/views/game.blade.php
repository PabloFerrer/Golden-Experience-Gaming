@extends('layouts.app')

@section('content')
@isset( $specificgame )
            <div class="gamepage">
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
					
					@guest
					
					@else
						@if(Auth::user()->role == 1)
                        <form action="/game/{{$specificgame->id}}/add" method="POST">
                              {{ csrf_field() }}
                              <input type="hidden" name="authid" id="authid" value=" {{ Auth::user()->id }}">
                              <input type="hidden" name="gameid" id="gameid" value=" {{ $specificgame->id }}">
                              <button type="submit" class="btn addtocart">Añadir al carrito</button>
                        </form>
						
						<form action="/game/{{$specificgame->id}}/wish" method="POST">
                              {{ csrf_field() }}
                              <input type="hidden" name="authid" id="authid" value=" {{ Auth::user()->id }}">
                              <input type="hidden" name="gameid" id="gameid" value=" {{ $specificgame->id }}">
                              <button type="submit" class="btn addtowish">Añadir a la lista de deseados</button>
                        </form>
						
						@endif
					@endguest
            		
            		</div>


            	</div>

            </div>
@else
      El juego no está en la base de datos
@endisset
@endsection
