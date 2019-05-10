<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use DB;

class GameSellerController extends Controller
{
    public function index($publisher_id){
		
		#$indexgames = DB::table('games')->select('name')->where('publisher_id', '=', $publisher_id )->get();
		$indexgames = Game::where('publisher_id',$publisher_id)->get();
		
		if (empty($indexgames)){
			return view('gameSeller');
		}
        return view('gameSeller')->with(compact('indexgames'));
    }
}
