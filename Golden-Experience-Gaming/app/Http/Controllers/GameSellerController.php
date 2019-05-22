<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Game;
use App\Genre;
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

    public function showeditgame(){
    	$publisher_id = Auth::id();
    	$games = Game::where('publisher_id','=',$publisher_id)->get();
    	return view('editgame')->with(['games'=>$games]);
    }

    public function editgamemenu($id){


    	$game = Game::find($id);
    	$genres = Genre::all();
    	$selectedgenres = DB::table('game_genre')->where('game_id','=',$id);
    	return view('editgametext')->with(compact('game','genres','selectedgenres'));

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
   		$genres = Genre::all();
   		return view('createGame')->with(['genres'=>$genres]);
   	}



	public function creategame(Request $request){
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
		$name = $request->input('name');
		$price = $request->input('price');
		$description = $request->input('description');
		$synopsis = $request->input('synopsis');

    $cover_extension = $request->file('cover')->getClientOriginalExtension();
    $cover_to_store = "cover_".uniqid().'.'.$cover_extension;
    $thumb_extension = $request->file('thumbnail')->getClientOriginalName();
    $thumb_to_store = "thumb_".uniqid().'.'.$thumb_extension;

		$publisher_id = Auth::id();
		$game = new Game();
		$game->name = $name;
		$game->price = $price;
		$game->description = $description;
		$game->synopsis = $synopsis;
    $game->publisher_id = $publisher_id;

    //Needs to check if images is jpg and png
    //return back()->with('notification', 'Juego añadido correctamente.');
    Storage::disk('ftp')->put($cover_to_store, fopen($request->file('cover'), 'r+'));
    Storage::disk('ftp')->put($thumb_to_store, fopen($request->file('thumbnail'), 'r+'));
		$game->icon_url = $thumb_to_store;
		$game->image_url = $cover_to_store;

		$game->save();
		$gameid=$game->id;
		if(isset($_POST['genres'])){
        	if (is_array($_POST['genres'])) {
             	foreach($_POST['genres'] as $value){
        			DB::table('game_genre')->insert([['game_id'=>$gameid,'genre_id'=>$value]]);
             	}
          	}
   		}



		return back()->with('notification', 'Juego añadido correctamente.');
	}
}
