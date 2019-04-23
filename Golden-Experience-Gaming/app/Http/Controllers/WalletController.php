<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;

class WalletController extends Controller
{
    public function index(){
		return view('wallet');
	}
	
	public function royalties(){
		return view('wallet');
	}
	
	public function update(Request $request){

		
		$this->validate($request, [
			'funds' => ['required','numeric'],
		], [
			'funds.required' => 'Inserte la cantidad de dinero que desea agregar.',
			'funds.numeric' => 'Inserte un número.'
		]);
		$authid = $request->input('authid');
		$user = User::find($authid);
		$user->wallet = $request->input('funds') + $user->wallet;		
		$user->save();
		
		
		Transaction::create(array('amount'=>$request->input('funds'), 'buyer_id'=>$user->id, 'game_id'=>null));
		
		return back()->with('notification', 'Fondos agregados con éxito.');
	}
	
	public function retrieve(Request $request){
		$authid = $request->input('authid');
		$user = User::find($authid);
		$user->wallet = $user->wallet - $request->input('funds');
		$user->save();
		
		Transaction::create(array('amount'=>$request->input('funds'), 'buyer_id'=>$user->id, 'game_id'=>null));
		return back()->with('notification', 'Fondos retirados con éxito.');
	}
}
