@extends('layouts.app')

@section('content')
@isset( $specificgame )
            <div class="gamepage">
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
            	<div class="row">
                        <div class="col-md-3">
                              <img src="{{asset('img/Fallout76.png')}}"></a> 
                        </div> 
            		<div class="col-md-2 gametitle">
                        <p>{{ $specificgame->name }}</p>
                        <p>Genero</p>
            		</div>
            		<div class="col-md-1 gametitle"><p>{{ $specificgame->price }}</p></div>	
            		<div class="col-md-2">
					
					@guest
					
					@else
						@if(Auth::user()->role == 1)
                        <form action="/game/{{$specificgame->id}}/add" method="POST">
                              {{ csrf_field() }}
                              <input type="hidden" name="authid" id="authid" value=" {{ Auth::user()->id }}">
                              <input type="hidden" name="gameid" id="gameid" value=" {{ $specificgame->id }}">
                              <button type="submit" class="btn addtocart">Añadir al carrito</button>
                        </form>
						
						<form action="/game/{{$specificgame->id}}/wish" method="POST">
                              {{ csrf_field() }}
                              <input type="hidden" name="authid" id="authid" value=" {{ Auth::user()->id }}">
                              <input type="hidden" name="gameid" id="gameid" value=" {{ $specificgame->id }}">
                              <button type="submit" class="btn addtowish">Añadir a la lista de deseados</button>
                        </form>
						
						@endif
					@endguest
            		
            		</div>


            	</div>
				
				<h3>Opiniones de los usuarios</h3>
				<div class="row">
					<div class="col-md-9">
						<div class="reviews-section">
						
							<div class="review">
								<div class="row">
									<div class="col-md-1">
										<div class="review-score">
											<h4>4.6</h4>
										</div>
									</div>
									<div class="col-md-11">
										<div class="review-user">
											Persona normal
										</div>
										<div class="review-content">
											Basura infumable, quiero mi dinero de vuelta
										</div>
									</div>
								</div>
							</div>
							
							<div class="review">
								<div class="row">
									<div class="col-md-1">
										<div class="review-score">
											<h4>10<h4>
										</div>
									</div>
									<div class="col-md-11">
										<div class="review-user">
											NotPablo
										</div>
										<div class="review-content">
											No escuchéis a los haters porque es que de verdad, la peña critica sin saber y  porque son unos haters y el juego no está tan mal, ¿no? O sea sí vale no es en plan genial pero es entretenido joder a mi me entretiene y en plan, eso, que es que la gente critica sin haber jugado y vale el juego de 10 no es pero es divertido.
										</div>										
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>

            </div>
@else
      El juego no está en la base de datos
@endisset
@endsection
