<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Opinion;
use App\User;
use DB;

class GameController extends Controller
{
	public function index($id){
		$specificgame = Game::find($id);
		
		$opinions = Opinion::where('game_id', $id)->get('user_id');
		$reviewers = Array();
		foreach($opinions as $opinion){
			$reviewer = User::where('id', $opinion->user_id)->first();
			$reviewers[] = $reviewer;
		}
   		return view('game')->with(compact('specificgame', 'reviewers'));
	}
	
	public function add(Request $request){
		$authid = $request->input('authid');
		$gameid = $request->input('gameid');
		$specificgame = Game::find($gameid);
		
		DB::table('game_user')->insert(
			array(
				'user_id' => $authid,
				'game_id' => $gameid,
				'owned' => 0,
				'on_cart' => 1
			)
		);		

		return back()->with('notification', 'Añadido al carrito.');
	}

	public function wish(Request $request){
		$authid = $request->input('authid');
		$gameid = $request->input('gameid');
		$specificgame = Game::find($gameid);
		
		DB::table('game_user')->insert(
			array(
				'user_id' => $authid,
				'game_id' => $gameid,
				'owned' => 2,
				'on_cart' => 0
			)
		);		

		return back()->with('notification', 'Añadido a la lista de deseados.');;
	}
	
   public static function getImage(Request $request){
	   $filename = $request->get("image_url");
	   return Storage::disk('s3')->get($filename);
   }
   public function game(){

   }
   	public function showcreategame(){
   	

   	return view('createGame');
   }

   

	public function createGame(Request $request){


	}
}