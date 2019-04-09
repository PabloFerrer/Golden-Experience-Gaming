@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
           
           @isset( $indexgames[0] )
				<a href="/game/{{$indexgames[0]->id}}">{{ $indexgames[0]->name }}</a>
									
			@else
				NO HAY JUEGO 
			@endisset
        </div>
        <div class="col-md-4">
            
           @isset( $indexgames[1] )

				<a href="/game/{{$indexgames[1]->id}}">{{ $indexgames[1]->name }}</a>
									
			@else
				NO HAY JUEGO 
			@endisset
			<br/>
			<br/>
			<img src="{{asset('img/Fallout76.png')}}" width="80" height="80" >
        </div>
    </div>
</div>
@endsection
