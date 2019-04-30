@extends('layouts.app')

@section('content')
@isset( $specificgame )
            <div class="gamepage container-float">
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
                <div class="col-md-7">
                    <img src="{{env('IMAGE_SERVER')}}{{ $specificgame->image_url}}"
                         class="game-main-page-image">
                </div>
            		<div class="col-md-5">
                  <div class="row">
                      <h2 class="game-page-title">{{ $specificgame->name }}</h2>
                  </div>
                <div class="row">
                    <p class="game-price">${{ $specificgame->price }}</p>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <p class="game-synopsis">{{ $specificgame->synopsis }}</p>
                    </div>
                    <div class="col-md-2"></div>
                </div>




					@guest

					@else
						@if(Auth::user()->role == 1)
          <div class="row">
            <div class="col-3"></div>
            <div class="col-3">
                  <form action="/game/{{$specificgame->id}}/add" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="authid" id="authid"
                           value=" {{ Auth::user()->id }}">
                    <input type="hidden" name="gameid" id="gameid"
                           value=" {{ $specificgame->id }}">
                      <button type="submit" class="btn game-button">Add to Cart</button>
                  </form>
              </div>
              <div class="col-3">
  						    <form action="/game/{{$specificgame->id}}/wish" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="authid" id="authid"
                           value=" {{ Auth::user()->id }}">
                    <input type="hidden" name="gameid" id="gameid"
                           value=" {{ $specificgame->id }}">
                    <button type="submit" class="btn game-button">Add to Wishlist</button>
                  </form>
              </div>
              <div class="col-3"></div>
            </div>

						@endif
					@endguest
            		</div>
            </div>


            	</div>
              <br>
              <div class="row">
                    <div class="col-md-7">
                      {{$specificgame->description}}
                    </div>
                    <div class="col-md-5"></div>
              </div>
				
				<h3>Opiniones de los usuarios</h3>
				<div class="row">
					<div class="col-md-9">
						@guest
						@else
							@if(Auth::user()->role == 1)
							<div class="review-write">
								<form action="/game/{{$specificgame->id}}/review" method="POST">
									{{ csrf_field() }}
									<h4>Deje su opinión</h4>
									<input type="hidden" name="authid" id="authid"
										   value=" {{ Auth::user()->id }}">
									<input type="hidden" name="gameid" id="gameid"
											value=" {{ $specificgame->id }}">
									<select name="score">
										<option value=""></option>
										<option value="10">10</option>
										<option value="9">9</option>
										<option value="8">8</option>
										<option value="7">7</option>
										<option value="6">6</option>
										<option value="5">5</option>
										<option value="4">4</option>
										<option value="3">3</option>
										<option value="2">2</option>
										<option value="1">1</option>
									</select>
									<input type="text" name="reviewbody" id="reviewbody" value={{ old('reviewbody', '') }}>
									<button type="submit" class="btn game-button">Send</button>
								</form>
							</div>
							@endif
						@endguest
					
						<div class="reviews-section">
							@foreach ($reviews as $review)
								<div class="review">
									<div class="row">
										<div class="col-md-1">
											<div class="review-score">
												<h4>{{$review->score}}</h4>
											</div>
										</div>
										<div class="col-md-11">
											<div class="review-user">
												{{$review->name}}
											</div>
											<div class="review-content">
												{{$review->body}}
											</div>
										</div>
									</div>
								</div>
							@endforeach							
						</div>
					</div>
				</div>
            </div>


@else
      Invalid game ID
@endisset
@endsection
