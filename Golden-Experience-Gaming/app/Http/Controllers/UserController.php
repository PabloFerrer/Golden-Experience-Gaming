<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function addGames($id)
    {
        $post = User::find($id);
        $post->games()->attach($game_ids);
    }

    public function getLibrary()
    {
        $gameIDs = DB::table('game_user')
                    ->where([
                        ['user_id','=',Auth::user()->id],
                        ['owned','=','1']
                    ])->pluck('game_id');
        $usergames = DB::table('games')->whereIn('id',$gameIDs)->get();
        return view('library')->with(compact('usergames'));
    }


}
