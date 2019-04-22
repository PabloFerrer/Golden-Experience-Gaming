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
						<div class="carousel-item active">
							<div class="bannergame">
								@isset( $indexgames[0] )
									{{ $indexgames[0]->name }}
								@else
									NO HAY JUEGO BANNER
								@endisset
							</div>
						</div>

						<div class="carousel-item">
							<div class="bannergame">
								@isset( $indexgames[1] )

									<a href="/game/{{$indexgames[1]->id}}">{{ $indexgames[1]->name }}</a>
								@else
									NO HAY JUEGO BANNER
								@endisset
							</div>
						</div>

						<div class="carousel-item">
							<div class="bannergame">
								@isset( $indexgames[2] )
									{{ $indexgames[2]->name }}

								@else
									NO HAY JUEGO BANNER
								@endisset
							</div>
						</div>

						<div class="carousel-item">
							<div class="bannergame">
								@isset( $indexgames[3] )
									{{ $indexgames[3]->name }}

								@else
									NO HAY JUEGO BANNER
								@endisset
							</div>
						</div>
					  </div>
				  <a class="carousel-control-prev" href="#bannercarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#bannercarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>

        <br>
				</div>
					<table class="table borderless index-table">
            <thead>
              <tr>
                <th scope="col" colspan=6>Best Selling Titles</th>
              </tr>
            </thead>
              <tr>
              @for ($i = 0; $i < 6; $i++)
                <td class="game-in-row">
  							@isset( $indexgames[$i] )
                  <a href="/game/{{$indexgames[$i]->id}}">
                    <img src="{{env('IMAGE_SERVER')}}{{$indexgames[$i]->image_url}}"
                         class="game-image">
                  </a>
  							@else
  								<img src="{{env('IMAGE_SERVER')}}default_image.png" class="game-image">
  							@endisset
                </td>
              @endfor
              </tr>
           </table>

           <table class="table borderless index-table">
             <thead>
               <tr>
                 <th scope="col" colspan=6>Another Category</th>
               </tr>
             </thead>
               <tr>
               @for ($i = 0; $i < 6; $i++)
                 <td class="game-in-row">
   							@isset( $indexgames[$i] )
                   <a href="/game/{{$indexgames[$i]->id}}">
                     <img src="{{env('IMAGE_SERVER')}}{{$indexgames[$i]->image_url}}"
                          class="game-image">
                   </a>
   							@else
   								<img src="{{env('IMAGE_SERVER')}}default_image.png" class="game-image">
   							@endisset
                 </td>
               @endfor
               </tr>
            </table>


					</div>
				</div>
			</div>
@endsection
