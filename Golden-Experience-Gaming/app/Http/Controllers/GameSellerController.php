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
