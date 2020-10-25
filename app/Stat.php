<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Player;

class Stat extends Model
{
    
    protected $fillable = ["goals" , "coefficient" , "points" , "player_id"];


    public function getpoints(){

        return $this->goals * $this->coefficient;
    }

    public function player(){

        return $this->belongsTo(Player::class);
    }
}
