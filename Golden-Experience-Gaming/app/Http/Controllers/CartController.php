<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Game;

class CartController extends Controller
{
    public function index(){
		return view('cart');
	}
	
	public function buy(){
		return view('wallet');
	}
}
