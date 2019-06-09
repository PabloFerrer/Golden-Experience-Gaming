<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="card" id="left-menu">
	<div class="card-header topmenu">Menu</div>

	<div class="card-body inmenu">
		<div class="list-group">
			<form action="/search" method="POST" role="search">
			    {{ csrf_field() }}
			    <div class="input-group">
			        <input type="text" class="form-control" name="q"
							placeholder="Search games">
							<span class="input-group-btn">
			            <button type="submit" class="btn btn-default"><i class="fas fa-search inmenu"></i> </button>
			        </span>
			    </div>
			</form>

			<a href="/catalog" class="list-group-item inmenu">
				<i class="fas fa-book-open"></i> Store  
			</a>

			@guest

			@else

			@if(Auth::user()->role == 1)

			<a class="list-group-item inmenu" href="{{ route('library') }}">
			<i class="fas fa-gamepad"></i>{{ __('My Library') }}</a>

			<a class="list-group-item inmenu" href="{{ route('wishlist') }}">
			<i class="fas fa-gem"></i>{{ __('My Wishlist') }}</a>

			@endif

			@if(Auth::user()->role == 2)

                <a class="list-group-item inmenu" href="/gameseller/{{ Auth::user()->id }}">
                <i class="fas fa-gamepad"></i>{{ __('My uploaded games') }}</a>
				<a class="list-group-item inmenu" href="/salesreports">
				<i class="fas fa-clipboard-list"></i> {{ __('Sales Reports') }}</a>
				<a class="list-group-item inmenu" href="/creategame">
				<i class="fas fa-upload"></i>{{ __('Upload Game') }}</a>
				<a class="list-group-item inmenu" href="/editgame">
				<i class="fas fa-edit"></i>{{ __('Edit Game') }}</a>				

        	@endif

        	@if(Auth::user()->role == 0)

        	<a class="list-group-item inmenu" href="/clientslist">
        	<i class="fas fa-list"></i>{{ __('Clients List') }} </a>
        	<a class="list-group-item inmenu" href="/publisherlist">
        	<i class="fas fa-list"></i>{{ __('Publishers List') }}</a>
        	<a class="list-group-item inmenu" href="/gameslist">
        	<i class="fas fa-list"></i>{{ __('Games List') }} </i></a>
        	<a class="list-group-item inmenu" href="/transactionlist">
        	<i class="fas fa-list"></i>{{ __('Transactions List') }} </i></a>
        	@endif

        	@endguest

		</div>
	</div>
</div>
