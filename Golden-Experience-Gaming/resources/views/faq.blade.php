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
			                	Buena pregunta
			                </td>
			            </tr>
			            <tr>
			            	<td>
			                	¿ Puedo valorar un juego sin estar registrado ?
                      		</td>
                      		<td>
			                	Excelente pregunta
			                </td>
			            </tr>
			            <tr>
			            	<td>
			                	¿ Los juegos son físicos o digitales ?
                      		</td>
                      		<td>
			                	Exquisita pregunta
			                </td>
			            </tr>
			            
			        </tbody>
			    </table>
			   
			</div>
      
</div>


@endsection
