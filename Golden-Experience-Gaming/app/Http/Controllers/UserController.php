<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addGames($id)
    {
        $post = User::find($id);
        $post->games()->attach($game_ids)
    }
}
