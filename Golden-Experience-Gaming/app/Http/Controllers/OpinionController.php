<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opinion;
use DB;

class OpinionController extends Controller
{
	public function review($id){
   		return view('game');
	}
	
}
