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
		<h2>At the moment you have:  {{ Auth::user()->wallet }} €</h2>
	</div>

	@if(Auth::user()->role == 1)
		<div class="addfunds">
			<h2>Select payment method:</h2>
			<form action="">
			  <input type="radio" name="method" value="mastercard" checked="checked" > MasterCard <i class="fab fa-cc-mastercard"></i><br>
			  <input type="radio" name="method" value="visa"> Visa <i class="fab fa-cc-visa"></i><br>
			  <input type="radio" name="method" value="paypal"> PayPal <i class="fab fa-cc-paypal"></i>
			</form>

			<h2>Insert a quantity you would like to add:</h2>

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


							<button type="submit" class="btn btn-primary">Save</button>

			</form>

		</div>
	@endif

	@if(Auth::user()->role == 2)
		@if(Auth::user()->wallet > 0)
			<div class="retrievefunds">
				<h2>How much money would you like to widthdraw?</h2>


				<form action="/royalties/retrieve" method="POST">
					{{ csrf_field() }}
					<h2>Widthdraw an specific quantity</h2>
					<input type="hidden" name="authid" id="authid" value=" {{ Auth::user()->id }}">
					<input type="text" name="funds" id="funds" value="">
					<input type="hidden" name="maxfunds" id="maxfunds" value=" {{ Auth::user()->wallet }}">
					<button type="submit" class="btn btn-primary">Widhdraw</button>
				</form>
				<form action="/royalties/retrieve" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="authid" id="authid" value=" {{ Auth::user()->id }}">
					<input type="hidden" name="funds" id="funds" value=" {{ Auth::user()->wallet }}">
					<input type="hidden" name="maxfunds" id="maxfunds" value=" {{ Auth::user()->wallet }}">
					<button type="submit" class="btn btn-primary">Widthdraw all the money</button>
				</form>
			</div>
		@endif
	@endif

</div>

@endsection
