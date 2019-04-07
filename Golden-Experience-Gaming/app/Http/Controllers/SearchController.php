<?php

namespace App\Http\Controllers;
use App\Game;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {


        return view('search');
    }

    public function game($game) {
	    return View::make('search')
	        ->with('game', $game);
	}

    public function getSearch()
        {
            //get keywords input for search
            $keyword=  Input::get('q');

            //search that student in Database
             $games= Game::find($keyword);

            //return display search result to user by using a view
            return view('search')->with('games', $games);
        }
  //   public function search($name)
  //   {
		// dd($name);
  //   	$searchedgame = Game::find($name);

  //   	dd($searchedgame);

  //  		return view('search')->with(compact('searchedgame'));
        
  //   }
}
