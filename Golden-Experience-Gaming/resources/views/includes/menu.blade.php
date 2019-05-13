<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="card" id="left-menu">
	<div class="card-header topmenu">Menú</div>

	<div class="card-body inmenu">
		<div class="list-group">

			<form action="/search" method="POST" role="search">
			    {{ csrf_field() }}
			    <div class="input-group">
			        <input type="text" class="form-control" name="q"
							placeholder="Buscar juegos">
							<span class="input-group-btn">
			            <button type="submit" class="btn btn-default"> </button>
			        </span>
			    </div>
			</form>

			<a href="/catalog" class="list-group-item inmenu">
				Store
			</a>

			@guest

			@else

			@if(Auth::user()->role == 1)

			<a class="list-group-item inmenu" href="{{ route('library') }}">
			{{ __('My Library') }}</a>

			<a class="list-group-item inmenu" href="{{ route('wishlist') }}">
			{{ __('My Wishlist') }}</a>

			@endif

			@if(Auth::user()->role == 2)

                <a class="list-group-item inmenu" href="/gameseller/{{ Auth::user()->id }}">
                {{ __('My uploaded games') }}</a>
				<a class="list-group-item inmenu" href="/salesreports">
				{{ __('Sales Reports') }}</a>
				<a class="list-group-item inmenu" href="/creategame">
				{{ __('Upload Game') }}</a>
				<a class="list-group-item inmenu" href="/editgame">
				{{ __('Edit Game') }}</a>				

        	@endif

        	@if(Auth::user()->role == 0)

        	<a class="list-group-item inmenu" href="/clientslist">
        	{{ __('Clients List') }}</a>
        	<a class="list-group-item inmenu" href="/publisherlist">
        	{{ __('Publishers List') }}</a>
        	<a class="list-group-item inmenu" href="/gameslist">
        	{{ __('Games List') }}</a>
        	<a class="list-group-item inmenu" href="/">
        	{{ __('Transactions List') }}</a>
        	@endif

        	@endguest

		</div>
	</div>
</div>
