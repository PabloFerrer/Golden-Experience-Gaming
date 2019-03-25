@extends('layouts.app')

@section('content')

            <div class="homepage">
				<div class="col-md-12">
					@isset( $indexgames[0] )
						{{ $indexgames[0]->name }}
						
					@else
						NO HAY JUEGO BANNER
					@endisset

				</div>
				<a href="/catalog">Ver catálogo</a>
				<div class = "reyeno">
				</div>
				<div class="col-md-12">
					<div class="indexgames" >
						
						<div class="indexgame">
							@isset( $indexgames[1] )
								{{ $indexgames[1]->name }}
								
							@else
								No hay suficientes juegos
							@endisset
						</div>
						<div class="indexgame">
							@isset( $indexgames[2] )
								{{ $indexgames[2]->name }}
								
							@else
								No hay suficientes juegos
							@endisset
						</div>
						<div class="indexgame">
							@isset( $indexgames[3] )
								{{ $indexgames[3]->name }}
								
							@else
								No hay suficientes juegos
							@endisset
						</div>
						<div class="indexgame">
							@isset( $indexgames[4] )
								{{ $indexgames[4]->name }}
								
							@else
								No hay suficientes juegos
							@endisset
						</div>
						<div class="indexgame">
							@isset( $indexgames[5] )
								{{ $indexgames[5]->name }}
								
							@else
								No hay suficientes juegos
							@endisset
						</div>
						<div class="indexgame">
							@isset( $indexgames[6] )
								{{ $indexgames[6]->name }}
								
							@else
								No hay suficientes juegos
							@endisset
						</div>
					</div>
				</div>
            </div>
@endsection
