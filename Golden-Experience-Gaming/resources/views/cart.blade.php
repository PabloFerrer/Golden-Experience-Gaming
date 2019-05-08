@extends('layouts.app')

@section('content')
<div class="row" id="cartcontainer">

		<div class="col-md-5 py-4">

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

			<h3>Productos en el carrito:</h3>
			<table class="table table-striped" id="cart-table">
				 <tbody>
					 @foreach ( Auth::user()->games  as $game)
						 @if ($game->pivot->on_cart == 1)
							 <tr class="gamerow">
									 <td>
										 <img src="{{env('IMAGE_SERVER')}}{{$game->image_url}}"
													class="game-image">
									 </td>
									 <td>
										 <strong class="cart-title">{{$game->name}}</strong>
									 	 <p>{{ $game->price }} €</p>
									 </td>
									 <td>
										 <form action="/cart/remove" method="POST">
	 											{{ csrf_field() }}
	 											<input type="hidden" name="authid" id="authid"
															 value=" {{ Auth::user()->id }}">
	 											<input type="hidden" name="gameid" id="gameid"
															 value=" {{ $game->id }}">
	 											<button type="submit" class="cart-button">Quitar</button>
 											</form>
									 </td>
							 </tr>
							@endif
						@endforeach
				 </tbody>
				</table>
			</div>

			<div class="col-md-4"></div>

			<!-- <div class="cart">
				<h3>Productos en el carrito:</h3>
					@foreach ( Auth::user()->games  as $game)
						@if ($game->pivot->on_cart == 1)

							<div class="cartgame">
								<div class="row">
									<div class="col-md-1">
									</div>
									<div class="col-md-3">
										Foto de juego
									</div>
									<div class="col-md-4">
										<a href="/game/{{$game->id}}"><p>{{ $game->name }}</p></a>
										<p>{{ $game->price }} €</p>
									</div>
									<div class="col-md-3">
										<form action="/cart/remove" method="POST">
											{{ csrf_field() }}
											<input type="hidden" name="authid" id="authid" value=" {{ Auth::user()->id }}">
											<input type="hidden" name="gameid" id="gameid" value=" {{ $game->id }}">
											<button type="submit" class="btn">Quitar</button>
										</form>
									</div>
									<div class="col-md-1">
									</div>

								</div>
							</div>
						@endif
					@endforeach
			</div> -->

		<div class="col-md-3 pay-menu">
			<div class="py-4 cartpay">
				<h4>Fondos actuales:</h4>
				<h4>{{ Auth::user()->wallet }} €</h4>


				<h4>Coste del carrito:</h4>
				<h4>
				<?php
					$total=0;
					foreach ( Auth::user()->games  as $game)
						if ($game->pivot->on_cart == 1)
						 $total = $game->price + $total;
				?>
				</h4>
				<h4>{{ $total }} €</h4>

				<h4>Dinero tras la transacción:</h4>
				<h4>{{ Auth::user()->wallet - $total}}€</h4>

				@if (Auth::user()->wallet - $total >= 0)
					@if( $total > 0)
					<form action="/cart/buy" method="POST">
					{{ csrf_field() }}
						<input type="hidden" name="authid" id="authid" value=" {{ Auth::user()->id }}">
						<input type="hidden" name="cost" id="cost" value=" {{ $total }}">
						<button type="submit" class="btn buy-button">Comprar</button>
					</form>
					@endif
				@else
					<p>Dinero insuficiente para transacción. Por favor, añada más fondos.</p>
				@endif
			</div>
		</div>



</div>

@endsection
