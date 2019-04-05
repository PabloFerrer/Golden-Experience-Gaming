@extends('layouts.app')

@section('content')
<div class="cartcontent">
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
		<div class="col-md-9">
			<div class="cart">
				<h3>Productos en el carrito:</h3>
				
				{{ Auth::user()->games[0]->name }}
				{{ Auth::user()->games[1]->name }}
				{{ Auth::user()->games[2]->name }}
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="cartpay">
				<h4>Fondos actuales:</h4>
				<h4>{{ Auth::user()->wallet }} €</h4>
				
				
				<h4>Coste del carrito:</h4>
				<h4>€</h4>
				
				<h4>Dinero tras la transacción:</h4>
				<h4>{{ Auth::user()->wallet - 0}}€</h4>
				
				<form action="/cart/buy" method="POST">
				{{ csrf_field() }}
			
					<button type="submit" class="btn cartbuy">Comprar</button>
				</form>
			</div>
		</div>
		
	</div>

		
	
</div>

@endsection
