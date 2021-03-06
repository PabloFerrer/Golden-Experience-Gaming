@extends('layouts.app')

@section('content')
<div class="wishlistcontent py-4">
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
				<h3>Wishlist:</h3>
					@foreach ( Auth::user()->games  as $game)
						@if ($game->pivot->owned == 2)
							<div class="container-fluid">
							<div class="col-md-6">
								<table class="table table-striped" id="wishlist-table">
							 		 <tbody>
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
													 <td>
														 @if ($game->pivot->on_cart == 1)
								 					 		 <p>Aleady on cart</p><br>
							 							 @else
															 <form action="/wishlist/{{$game->id}}/add" method="POST">
						                     {{ csrf_field() }}
						                     <input type="hidden" name="authid" id="authid"
						                            value=" {{ Auth::user()->id }}">
						                     <input type="hidden" name="gameid" id="gameid"
						                            value=" {{ $game->id }}">
						                       <button type="submit" class="btn wishlist-button">Add to Cart</button>
						                   </form>
														 @endif
														<form action="/wishlist/remove" method="POST">
						 									{{ csrf_field() }}
						 									<input type="hidden" name="authid"
																		 id="authid" value=" {{ Auth::user()->id }}">
						 									<input type="hidden" name="gameid"
																		 id="gameid" value=" {{ $game->id }}">
						 									<button type="submit" class="btn wishlist-button">Remove</button>
						 								</form>
							 						 </td>
							 				 </tr>
							 		 </tbody>
							  	</table>
								</div>
							</div>
						@endif
					@endforeach
			</div>
</div>
@endsection
