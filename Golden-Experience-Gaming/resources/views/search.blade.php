@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
           
			<div class="container">
			    @if(isset($details))
			        <p> Resultados de tu búsqueda <b> {{ $query }} </b> </p>
			    <h2>Juegos encontrados </h2>
			    <table class="table table-striped">
			        <thead>
			            <tr>
			                <th>Nombre</th>
			                <th>Enlace</th>
			                
			            </tr>
			        </thead>
			        <tbody>
			            @foreach($details as $game)
			            <tr>
			                <td>{{$game->name}}</td>
			                <td>
			                	<a href="/game/{{$game->id}}"> IR</a>
			                </td>
			                
			            </tr>
			            @endforeach
			        </tbody>
			    </table>
			    @endif
			</div>
			                

                
                    

                
           
        </div>
    </div>
</div>

@endsection
