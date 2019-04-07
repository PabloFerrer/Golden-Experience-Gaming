<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class CatalogController extends Controller
{
    public function index(){
		$indexgames = Game::orderBy('created_at','desc')->get();
		if (empty($indexgames)){
			return view('catalog');
		}
        return view('catalog')->with(compact('indexgames'));
    }
}
