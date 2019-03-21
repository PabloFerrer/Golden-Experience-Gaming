<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function game(){
        return $this->belongsTo('App\Game');
    }

}
