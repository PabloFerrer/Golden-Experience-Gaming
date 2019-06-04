@extends('layouts.app')

@section('content')

<div class="py-4 container-fluid" id="game-search-container">
    <div class="row col-md-6">
			   
			    <h3> Preguntas más <strong>frecuentes</strong></h3>
			    <table class="table table-striped" id="game-search-table">
			        <tbody>
			           
			            <tr class="gamerow">
			                <td>
			                	¿ Puedo comprar un juego sin estar registrado ?
                      		</td>
			                <td>
			                	Tienes que estar registrado para poder acceder a los servicios de nuestra web.
			                </td>
			            </tr>
			            <tr class="gamerow">
			            	<td>
			                	¿ Puedo valorar un juego sin estar registrado ?
                      		</td>
                      		<td>
			                	Tienes que estar registrado para poder acceder a los servicios de nuestra web.
			                </td>
			            </tr>
			            <tr class="gamerow">
			            	<td>
			                	¿ Los juegos son físicos o digitales ?
                      		</td>
                      		<td>
			                	Los juegos son digitales
			                </td>
			            </tr>
			            
			        </tbody>
			    </table>
			   
			</div>
      
</div>


@endsection
