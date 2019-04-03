@extends('layouts.app')

@section('content')
@isset( $specificgame )
            <div class="gamepage ">
            	<div class="col-md-12 ">
            		<div class="col-md-8"> </div>	
            		<div class="col-md-3">
                        {{ $specificgame->name }}
            		</div>
            		<div class="col-md-1"></div>	
            		<div class="col-md-2">
            		<button type="button" class="btn">Boton</button>
            		</div>


            	</div>

            </div>
@else
      El juego no está en la base de datos
@endisset
@endsection
