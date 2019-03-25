@extends('layouts.app')

@section('content')

            <div class="homepage">
				<div class="col-md-12">
					@isset( $bannergame )
						{{ $bannergame->name }}
						
					@else
						NO HAY JUEGO BANNER
					@endisset
				</div>
				<div class="col-md-12">
					JUEGOS MÁS RECIENTES
				</div>
            </div>
@endsection
