<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlayerRequest;
use App\Country;
use App\Club;
use App\Player;
use App\Stat;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $player = Player::orderBy('market_value', 'DESC')->get();

        return view('player.index' , ["player" => $player]);
    }

    public function get_club(Request $request){

        $club = Club::whereCountryId($request->country_id)->pluck('name','id');
        return response()->json($club);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::all();

        return view('player.create')->with('country' , $country);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request)
    {
        $player =  Player::create([

            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            'position' => $request->position,
            "image" => $request->image->store('imagplayers' , 'public'),
            "country_id" => $request->country_id,
            "club_id" => $request->club_id,
            "market_value" => $request->market_value,
            "nationality" => $request->nationality,
            "date_birth" => $request->date_birth 
        ]); 

        $stat = Stat::create([

            "player_id" => $player->id

        ]);


        return $player; 
        return redirect(route('players.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
