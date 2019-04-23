<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Game;
use App\Transaction;
use DB;

class CartController extends Controller
{
    public function index(){

		return view('cart');
	}
	
	public function buy(Request $request){
		
		$total = $request->input('cost');
		$user = User::find($request->input('authid'));
		$wallet = $user->wallet;
		if($wallet >= $total){
			foreach ($user->games as $games){
				if($games->pivot->on_cart ==1){
					Transaction::create(array('amount'=>$games->price, 'buyer_id'=>$user->id, 'game_id'=>$games->id));
					Transaction::create(array('amount'=>-($games->price), 'buyer_id'=>$games->publisher_id, 'game_id'=>$games->id));
					
					$publisher = User::find($games->publisher_id);
					
					$publisher->wallet = $publisher->wallet + $games->price;
					
					$user->wallet = $wallet - $total;		
					$games->save();
					$user->save();					
					$publisher->save();
					DB::update('update game_user set on_cart = 0, owned = 1 where user_id = ? and game_id = ? and on_cart = 1 limit 1', [$user->id, $games->id]);
					

					
				}
			}
			return back()->with('notification','¡Compra realizada con éxito!');
			
		}else{
			$neededfunds = $total - $wallet;
			
			return view('wallet')->with(compact('neededfunds'));
		}
	}
	
	public function remove(Request $request){
		$authid = $request->input('authid');
		$gameid = $request->input('gameid');
		
		DB::update('update game_user set on_cart = 0 where user_id = ? and game_id = ? and on_cart = 1 limit 1', [$authid, $gameid]);
		
		return back()->with('notification', 'Juego quitado del carrito.');
	}
}
