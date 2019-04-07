@extends('layouts.app')

@section('content')
<div class="walletcontent">
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


	<div class="currentwallet">
		<h2>En estos momentos, cuenta con {{ Auth::user()->wallet }} €</h2>
	</div>
	
	<div class="addfunds">
		<h2>¿Cómo desea añadir fondos?</h2>
		<form action="">
		  <input type="radio" name="method" value="mastercard"> MasterCard<br>
		  <input type="radio" name="method" value="visa"> Visa<br>
		  <input type="radio" name="method" value="paypal"> PayPal
		</form>
		
		<h2>Inserte la cantidad que desea agregar</h2>
		
		<form action="/wallet/edit" method="POST">
			{{ csrf_field() }}
			
						<input type="hidden" name="authid" id="authid" value=" {{ Auth::user()->id }}">
						<div class="form-group">
							@isset( $neededfunds )
								<input type="text" class="form-control" name="funds" id="funds" value="{{$neededfunds}}">
								
							@else
								<input type="text" class="form-control" name="funds" id="funds" value="">
							@endisset
						

						</div>


						<button type="submit" class="btn btn-primary">Guardar</button>

		</form>
		
	</div>
</div>

@endsection
