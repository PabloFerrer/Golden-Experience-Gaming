@extends('layouts.app')

@section('content')

            <div class="homepage">
				<div id="bannercarousel" class="carousel slide" data-ride="carousel">
				
				    <ol class="carousel-indicators">
					  <li data-target="#bannercarousel" data-slide-to="0" class="active"></li>
					  <li data-target="#bannercarousel" data-slide-to="1"></li>
					  <li data-target="#bannercarousel" data-slide-to="2"></li>
					  <li data-target="#bannercarousel" data-slide-to="3"></li>
					</ol>
					
					<div class="carousel-inner">
						<div class="item active">
							<div class="bannergame">
								@isset( $indexgames[0] )
									{{ $indexgames[0]->name }}
									
								@else
									NO HAY JUEGO BANNER
								@endisset
							</div>
						</div>

						<div class="item">
							<div class="bannergame">
								@isset( $indexgames[1] )
									{{ $indexgames[1]->name }}
									
								@else
									NO HAY JUEGO BANNER
								@endisset
							</div>
						</div>

						<div class="item">
							<div class="bannergame">
								@isset( $indexgames[2] )
									{{ $indexgames[2]->name }}
									
								@else
									NO HAY JUEGO BANNER
								@endisset
							</div>
						</div>
						
						<div class="item">
							<div class="bannergame">
								@isset( $indexgames[3] )
									{{ $indexgames[3]->name }}
									
								@else
									NO HAY JUEGO BANNER
								@endisset
							</div>
						</div>
					  </div>
					 		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							  <span class="glyphicon glyphicon-chevron-left"></span>
							  <span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#myCarousel" data-slide="next">
							  <span class="glyphicon glyphicon-chevron-right"></span>
							  <span class="sr-only">Next</span>
							</a>
				</div>
				
				<div class = "relleno">
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
