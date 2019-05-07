<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use DB;


class SalesController extends Controller
{
    public function index(){
		$id = Auth::id();
		
		$bestselling = DB::table('transactions')
			->join('games', 'transactions.game_id', '=', 'games.id')
			->select('games.name')
			->where('games.publisher_id', '=', $id)
			->where('transactions.amount', '>', 0)
			->groupBy('games.name')
			->orderByRaw('COUNT(*) DESC')
			->first();
		
		$salesreport = DB::table('transactions')
			->join('users', 'transactions.buyer_id', '=', 'users.id')
			->join('games', 'transactions.game_id', '=', 'games.id')
			->select('transactions.created_at','amount','users.name as username','games.name as gamename')
			->where('games.publisher_id', '=', $id)
			->where('transactions.amount', '>', 0)
			->orderBy('transactions.created_at', 'desc')
			->get();
		return view('salesreports')->with(compact('salesreport', 'bestselling'));
	}
}
