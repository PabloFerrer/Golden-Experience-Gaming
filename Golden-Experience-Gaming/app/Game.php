<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //

    public function users(){
        return $this->belongsToMany('App\User',
                                    'game_user', 'user_id', 'game_id');
    }

    public function publisher(){
        return $this->belongsTo('App\User');
    }

    public function transactions(){
        return $this->hasMany('App\Transaction');
    }

    public function opinions(){
        return $this->hasMany('App\Opinion');
    }
}
