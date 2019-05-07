<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
		$bannergames = Game::orderBy('updated_at','desc')->take(4)->get();
		$bestsellinggames = DB::table('transactions')
			->join('games', 'transactions.game_id', '=', 'games.id')
			->select('games.name', 'games.id', 'games.image_url')
			->where('transactions.amount', '>', 0)
			->groupBy('games.name', 'games.id', 'games.image_url')
			->orderByRaw('COUNT(*) DESC')
			->take(6)
			->get();
		$recentgames = Game::latest()->take(6)->get()->reverse();
		// if (empty($indexgames)){
		// 	return view('index');
		// }
    return view('index')->with(compact('bestsellinggames', 'recentgames', 'bannergames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
