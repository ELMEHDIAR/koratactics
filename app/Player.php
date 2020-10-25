<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\Club;
use Carbon\Carbon;
use App\Stat;

class Player extends Model
{
    protected $guarded = [];

    protected $fillable = ['first_name' , 'last_name', 'date_birth','nationality'
     , 'position' , 'country_id' , 'club_id' , 'market_value' , 'image'];


   public function country(){ 
    return $this->belongsTo(Country::class); 
   }   
   
   public function club(){
      return $this->belongsTo(Club::class); 
   }


   public function stat(){
    return $this->hasMany(Stat::class); 
 }

   public function getAgeAttribute()
    {
    return Carbon::parse($this->attributes["date_birth"])->age;
    }

 
}
