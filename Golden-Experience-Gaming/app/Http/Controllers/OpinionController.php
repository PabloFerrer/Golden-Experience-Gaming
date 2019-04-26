<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opinion;
use DB;

class OpinionController extends Controller
{
	public function review(Request $request){
		
		$rules=[
			'score' => ['required'],
			'reviewbody' => ['required']
		];
		
		$messages=[
			'score.required' => 'Necesita puntúar el juego.',
			'reviewbody.required' => 'Necesita escribir una crítica.'
		];
		
		$this->validate($request, $rules, $messages);
		
		$opinion = new Opinion();
		$opinion->body = $request->input('reviewbody');
		$opinion->score = $request->input('score');
		$opinion->user_id = $request->input('authid');
		$opinion->game_id = $request->input('gameid');
		
		$opinion->save();
		
   		return back()->with('notification', '¡Gracias por dejar constancia de su opinión!.');
	}
	
}
