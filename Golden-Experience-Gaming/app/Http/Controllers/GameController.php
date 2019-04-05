<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GameController extends Controller
{
	public function index($id){
		$specificgame = Game::find($id);
   		return view('game')->with(compact('specificgame'));
	}
	
	public function add(Request $request){
		$authid = $request->input('authid');
		$gameid = $request->input('gameid');
		$specificgame = Game::find($gameid);

		return view('game')->with(compact('specificgame'));
	}

   public static function getImage(Request $request){
	   $filename = $request->get("image_url");
	   return Storage::disk('s3')->get($filename);
   }
   public function game(){

   }


}
