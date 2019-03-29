<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class WalletController extends Controller
{
    public function index(){
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
		return back()->with('notification', 'Fondos agregados con éxito.');
	}
}
