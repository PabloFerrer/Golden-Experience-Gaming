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
				Catálogo
			</a>

			<a href="#" class="list-group-item inmenu">
				Prueba 2
			</a>
			<a href="#" class="list-group-item inmenu">
				Prueba 3
			</a>
			<a href="#" class="list-group-item inmenu">
				Prueba 3
			</a>
			<a href="#" class="list-group-item inmenu">
				Prueba 3
			</a>
			<a href="#" class="list-group-item inmenu">
				Prueba 3
			</a>

				@guest

				@else

				@if(Auth::user()->role == 2)
                <li class="nav-link dropdown">
                    <a class="list-group-item inmenu" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Juegos en venta</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/">Subir juego</a>
                      <a class="dropdown-item" href="/">Borrar juego</a>
                      <a class="dropdown-item" href="/">Editar juego </a>
                      
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/gameseller">Mis juegos en venta</a>
                    </div>
                </li>
                @endif
                @endguest
		</div>
	</div>
</div>
