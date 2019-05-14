<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Game;
use DB;

class WishlistController extends Controller
{
    public function index(){

		return view('wishlist');
	}
	
	public function add(Request $request){
		
		$authid = $request->input('authid');
		$gameid = $request->input('gameid');
		
		DB::update('update game_user set on_cart = 1 where user_id = ? and game_id = ? and owned=2 and on_cart = 0 limit 1', [$authid, $gameid]);

		return back()->with('notification', 'Añadido al carrito.');
	}
	
	public function remove(Request $request){
		$authid = $request->input('authid');
		$gameid = $request->input('gameid');
		
		DB::update('update game_user set owned = 0 where user_id = ? and game_id = ? and owned=2 limit 1', [$authid, $gameid]);
		
		return back()->with('notification', 'Juego quitado de la lista de deseados.');
	}
}
