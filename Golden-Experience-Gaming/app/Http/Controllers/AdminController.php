<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class AdminController extends Controller
{


    public function getpublishers()
    {
        $publishers = User::where('role','=','2')->get();
        return view('publisherlist')->with(['publishers'=>$publishers]);
    }

    public function editpublisher(Request $request)
    {
        $publisherid=$request->input('publisherlist');
        
        $publisher= User::find($publisherid);
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

}
