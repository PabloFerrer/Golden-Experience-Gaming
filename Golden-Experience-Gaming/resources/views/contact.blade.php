@extends('layouts.app')

@section('content')

<div class="py-4 container-fluid" id="game-search-container">
    <div class="row col-md-6">
    	 <h3> Envíanos tus sugerencias y comentarios</h3>
			   
			    <form name="contactform" action="{{ action('FooterController@index') }}">
					<table width="450px">
					<tr>
					 <td valign="top">
					  <label for="first_name">Nombre *</label>

					 </td>
					 <br>
					 <td valign="top">
					  <input  type="text" name="first_name" maxlength="50" size="30">
					 </td>
					</tr>

					<br>
					<tr>
					 <td valign="top">
					  <label for="last_name">Apellido *</label>
					 </td>
					 <td valign="top">
					  <input  type="text" name="last_name" maxlength="50" size="30">
					 </td>
					</tr>
					<tr>
					 <td valign="top">
					  <label for="email">E-mail *</label>
					 </td>
					 <td valign="top">
					  <input  type="text" name="email" maxlength="80" size="30">
					 </td>
					</tr>
					<tr>
					 <td valign="top">
					  <label for="telephone">Telefono</label>
					 </td>
					 <td valign="top">
					  <input  type="text" name="telephone" maxlength="30" size="30">
					 </td>
					</tr>
					<tr>
					 <td valign="top">
					  <label for="message">Mensaje *</label>
					 </td>
					 <td valign="top">
					  <textarea  name="message" maxlength="1000" cols="25" rows="6"></textarea>
					 </td>
					</tr>
					<tr>
					 <td colspan="2" style="text-align:center">
					  <input type="submit" value="Enviar">   
					 </td>
					</tr>
					</table>
				</form>

				<p>En cuanto podamos te volveremos a contactar </p>
			   
			</div>
      
</div>


@endsection
