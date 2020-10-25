<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Club;
use App\Player;

class Country extends Model
{
    protected $guarded = [];
    
    public function clubs(){

        return $this->hasMany(Club::class);
    }

    public function players(){ 
        $this->hasMany(Player::class); 
       } 
}
