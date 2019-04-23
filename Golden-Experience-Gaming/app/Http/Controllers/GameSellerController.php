<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GameSellerController extends Controller
{
    public function index(){
		$indexgames = Game::orderBy('created_at','desc')->get();
		if (empty($indexgames)){
			return view('gameSeller');
		}
        return view('gameSeller')->with(compact('indexgames'));
    }
}
