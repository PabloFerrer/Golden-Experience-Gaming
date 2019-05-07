<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Game;
use DB;

class GameSellerController extends Controller
{
    public function index($publisher_id){
		
		#$indexgames = DB::table('games')->select('name')->where('publisher_id', '=', $publisher_id )->get();
		$indexgames = Game::where('publisher_id',$publisher_id)->get();
		#dd($indexgames);
		if (empty($indexgames)){
			return view('gameSeller');
		}
        return view('gameSeller')->with(compact('indexgames'));
    }

    public function showeditgame(){
    	$publisher_id = Auth::id();
    	$games = Game::where('publisher_id','=',$publisher_id)->get();
    	return view('editgame')->with(['games'=>$games]);
    }

    public function editgamemenu(Request $request){

    	$gameid=$request->input('games');
    	$game = Game::find($gameid);
    	$genres = DB::table('game_genre')->where('game_id','=',$gameid);
    	return view('editgametext')->with(compact('game'));
    }

    public function editgame(Request $request){
		$this->validate($request, [
			'price' => ['required','numeric'],
			'description' => ['required'],
			'name' => ['required'],
			'synopsis' => ['required']
		], [
			'price.required' => 'Insert the game´s price.',
			'price.numeric' => 'Insert a correct number.',
			'description.required' => 'Insert the game´s description',
			'name.required' => 'Insert the game´s name',
			'synopsis.required' => 'Insert the game´s synopsis.'
			]);
		$id = $request->input('id');
		$name = $request->input('name');
		$price = $request->input('price');
		$description = $request->input('description');
		$synopsis = $request->input('synopsis');
		$game = Game::find($id);
		$game->name = $name;
		$game->price = $price;
		$game->description = $description;
		$game->synopsis = $synopsis;
		$game->save();
		return back()->with('notification', 'Juego editado correctamente.');
    }



   	public function showcreategame(){
   		return view('createGame');
   	}

   

	public function creategame(Request $request){
		$this->validate($request, [
			'price' => ['required','numeric'],
			'description' => ['required'],
			'name' => ['required'],
			'synopsis' => ['required'],
			'genre' => ['required']
		], [
			'price.required' => 'Insert the game´s price.',
			'price.numeric' => 'Insert a correct number.',
			'description.required' => 'Insert the game´s description',
			'name.required' => 'Insert the game´s name',
			'synopsis.required' => 'Insert the game´s synopsis.',
			'genre.required' => 'Insert a genre for the game.'
		]);
		$name = $request->input('name');
		$price = $request->input('price');
		$description = $request->input('description');
		$synopsis = $request->input('synopsis');
		$genre = $request->input('genre');
		$publisher_id = Auth::id();
		$game = new Game();
		$game->name = $name;
		$game->price = $price;
		$game->description = $description;
		$game->synopsis = $synopsis;
		$game->icon_url = 'default_icon.png';
		$game->image_url = 'default_image.png';
		$game->publisher_id = $publisher_id;
		$game->save();
		$gameid=$game->id;
		$genreid = DB::table('genres')->where('name','=',$genre)->value('id');
		DB::table('game_genre')->insert([['game_id'=>$gameid,'genre_id'=>$genreid]]);
		
		return back()->with('notification', 'Juego añadido correctamente.');
	}
}
