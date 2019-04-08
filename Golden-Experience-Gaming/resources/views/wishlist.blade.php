@extends('layouts.app')

@section('content')
<div class="wishlistcontent">
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


			<div class="wishlist">
				<h3>Lista de deseados:</h3>
					@foreach ( Auth::user()->games  as $game) 
						@if ($game->pivot->owned == 2)
							<div class="wishgame">
								<div class="wishpic">
									Foto del juego
								</div>
								<div class="wishname">
									<p>{{$game->name}}</p>
								</div>
								
								@if ($game->pivot->on_cart == 1)
									<p>Tiene este juego en el carrito</p>
								@else

									<form action="/wishlist/{$game->id}/add" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="authid" id="authid" value=" {{ Auth::user()->id }}">
										<input type="hidden" name="gameid" id="gameid" value=" {{ $game->id }}">
										<button type="submit" class="btn">Añadir al carrito</button>								
									</form>
									
								@endif
								
								
								<form action="/wishlist/remove" method="POST">
									{{ csrf_field() }}
									<input type="hidden" name="authid" id="authid" value=" {{ Auth::user()->id }}">
									<input type="hidden" name="gameid" id="gameid" value=" {{ $game->id }}">
									<button type="submit" class="btn">Quitar</button>								
								</form>
							</div>
						@endif
					@endforeach
			</div>


		
	
</div>

@endsection
