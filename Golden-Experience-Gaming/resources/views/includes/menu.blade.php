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
			<a href="#" class="list-group-item inmenu">
				Prueba 3
			</a>
		</div>
	</div>
</div>
