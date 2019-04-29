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

                      <a class="dropdown-item" href="/gameseller/{{ Auth::user()->id }}">Mis juegos en venta</a>

				<a class="list-group-item inmenu" href="/creategame">
				{{ __('Upload Game') }}</a>

        @endif
        @endguest

		</div>
	</div>
</div>
