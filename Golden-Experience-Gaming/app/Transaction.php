<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
	
	protected $fillable = [
		'amount', 'buyer_id', 'game_id',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'buyer_id');
    }

    public function game(){
        return $this->belongsTo('App\Game', 'game_id');
    }
}
