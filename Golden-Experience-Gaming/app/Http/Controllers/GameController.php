<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Game;
use App\Opinion;
use App\User;
use DB;

class GameController extends Controller
{
	public function index($id){
		$specificgame = Game::find($id);
		
		$reviews = DB::table('opinions')
			->join('users', 'opinions.user_id', '=', 'users.id')
			->where('opinions.game_id', '=', $id)
			->get();

   		return view('game')->with(compact('specificgame', 'reviews'));
	}
	
	public function add(Request $request){
		$authid = $request->input('authid');
		$gameid = $request->input('gameid');
		$specificgame = Game::find($gameid);
		
		DB::table('game_user')->insert(
			array(
				'user_id' => $authid,
				'game_id' => $gameid,
				'owned' => 0,
				'on_cart' => 1
			)
		);		

		return back()->with('notification', 'Añadido al carrito.');
	}

	public function wish(Request $request){
		$authid = $request->input('authid');
		$gameid = $request->input('gameid');
		$specificgame = Game::find($gameid);
		
		DB::table('game_user')->insert(
			array(
				'user_id' => $authid,
				'game_id' => $gameid,
				'owned' => 2,
				'on_cart' => 0
			)
		);		

		return back()->with('notification', 'Añadido a la lista de deseados.');;
	}
	
   public static function getImage(Request $request){
	   $filename = $request->get("image_url");
	   return Storage::disk('s3')->get($filename);
   }
   public function game(){

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
		DB::table('games')->insert([['name' => $name,'price'=>$price,'description'=>$description,
			'synopsis'=>$synopsis,'icon_url'=>'default_icon.png','image_url'=>'default_image.png','publisher_id'=>$publisher_id]]);
		$gameid = DB::table('games')->where('name','=',$name)->value('id');
		$genreid = DB::table('genres')->where('name','=',$genre)->value('id');
		DB::table('game_genre')->insert([['game_id'=>$gameid,'genre_id'=>$genreid]]);
		
		return back()->with('notification', 'Juego añadido correctamente.');
	}
}