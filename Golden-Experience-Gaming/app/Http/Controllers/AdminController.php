<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Game;
use App\Transaction;

class AdminController extends Controller
{


    public function getpublishers()
    {
        $publishers = User::where('role','=','2')->get();
        return view('publisherlist')->with(['publishers'=>$publishers]);
    }

    public function editpublisher($id)
    {
        #$publisherid=$request->input('publisherlist');

        
        $publisher= User::find($id);
        return view('editpublisher')->with(compact('publisher'));

    }

    public function editpublisherinfo(Request $request){
        $this->validate($request, [
            'wallet' => ['required','numeric'],
            'name' => ['required'],
            'email' => ['required']
            
        ], [
            'wallet.required' => 'Insert the publisher´s wallet.',
            'wallet.numeric' => 'Insert a correct number.',
            'name.required' => 'Insert the publisher´s name',
            'email.required' => 'Insert the publisher´s email'
            ]);
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $wallet = $request->input('wallet');
        $publisher = User::find($id);
        $publisher->name = $name;
        $publisher->email = $email;
        $publisher->wallet = $wallet;
        $publisher->save();
        return back()->with('notification', 'Publisher correctly edited.');
    }

public function getclients()
    {
        $clients = User::where('role','=','1')->get();
        return view('clientslist')->with(['clients'=>$clients]);
    }

    public function editclient($id)
    {
        $client= User::find($id);
        return view('editclient')->with(compact('client'));

    }

    public function editclientinfo(Request $request){
        $this->validate($request, [
            'wallet' => ['required','numeric'],
            'name' => ['required'],
            'email' => ['required']
            
        ], [
            'wallet.required' => 'Insert the client´s wallet.',
            'wallet.numeric' => 'Insert a correct number.',
            'name.required' => 'Insert the client´s name',
            'email.required' => 'Insert the client´s email'
            ]);
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $wallet = $request->input('wallet');
        $client = User::find($id);
        $client->name = $name;
        $client->email = $email;
        $client->wallet = $wallet;
        $client->save();
        return back()->with('notification', 'Client correctly edited.');
    }
    public function getgames(){
        $games = Game::all();
        return view('gameslist')->with(compact('games'));
    }

    public function gettransactions(){
        $transactions = Transaction::all();
        return view ('transactionlist')->with(compact('transactions'));
    }
}
