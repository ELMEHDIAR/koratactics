<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\Player;

class Club extends Model
{
    protected $guarded = [];

    protected $primaryKey = 'id';

    
    public function country(){

        return $this->belongsTo(Country::class);
    }

    public function players(){ 
         return $this->hasMany(Player::class );
       } 
}
