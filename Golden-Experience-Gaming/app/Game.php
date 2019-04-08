<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //

    public function users(){
        return $this->belongsToMany('App\User');
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

    public function genres(){
        return $this->belongsToMany('App\Genre');
    }
}
