<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stat;
use App\Player;
use DB;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $stat = Stat::orderBy('points' , 'DESC')->paginate(10);
        return view('stats.index' , ["stat" => $stat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Stat $stat)
    {
        //$stat = Stat::find($id);
        return view('stats.edit' , ["stat" => $stat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        
        $this->validate($request , [

            "goals" => 'required',
            "coefficient" => 'required', 
            //"points" => 'required', 
            "player_id" => 'required' 

        ]);

        $sta = Stat::find($id);
        $sta->goals = $request->goals; 
        $sta->coefficient = $request->coefficient; 
        $sta->points = $request->points = ($request->goals * $request->coefficient) ; 
        $sta->player_id = $request->player_id; 
        $sta->save();
             
            return redirect(route('stats.index')); 
            
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
