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


              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 review-space">
                      <p>No opinions for this game yet.</p>
                </div>
                <div class="col-md-2"></div>
              </div>

            </div>


@else
      Invalid game ID
@endisset
@endsection
