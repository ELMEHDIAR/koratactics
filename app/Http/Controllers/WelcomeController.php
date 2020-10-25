<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Player;
use App\Category;
use App\Country;
use App\Club;
use App\Stat;
use DB;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        function action(Request $request)
        {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {

         /*$data = DB::table('players') 
            ->where('first_name', 'like', '%'.$query.'%')
            //->orWhere('last_name', 'like', '%'.$query.'%') 
            ->orWhere('nationality', 'like', '%'.$query.'%')  
            ->orWhere('clubs.name', 'like', '%'.$query.'%')  
            ->join('clubs', 'players.club_id', '=', 'clubs.id') 
            //->join('stats', 'stats.player_id', '=', 'player.id')
            ->select('players.*', 'clubs.name')
            ->orderBy('market_value', 'desc')
            ->get();*/ 

            $data = DB::table('stats') 
            ->where('goals', 'like', '%'.$query.'%')
            //->orWhere('last_name', 'like', '%'.$query.'%') 
            //->orWhere('nationality', 'like', '%'.$query.'%')  
            ->orWhere('players.first_name', 'like', '%'.$query.'%') 
            ->orWhere('clubs.name', 'like', '%'.$query.'%') 
            ->join('players', 'stats.player_id', '=', 'players.id')
            ->join('clubs', 'players.club_id', '=', 'clubs.id')  
            //->join('stats', 'stats.player_id', '=', 'player.id')
            ->select('players.*', 'stats.*' , 'clubs.*')
            ->orderBy('points', 'desc') 
            ->get();

            
            
            
        }
        else
        {
            /*$data = DB::table('players')
            ->join('clubs', 'players.club_id', '=', 'clubs.id')  
            ->orderBy('market_value', 'desc')  
            ->get();*/ 

            $data = DB::table('stats')  
            ->join('players', 'stats.player_id', '=', 'players.id')    
            ->join('clubs', 'players.club_id', '=', 'clubs.id') 
            ->orderBy('points', 'desc')  
            ->get(); 
        } 
        $total_row = $data->count();
        if($total_row > 0)
        {
        foreach($data as $row)
        {
            if ($row->points > 0) 
            { 
                
            $output .= '
            <tr> 
            <td class="text-center">'. '<img height="60px" width="60px" src="/storage/'.$row->image.'">'  .'</td>
            <td class="text-center">'.$row->first_name." ".$row->last_name.'</td>
            <td class="text-center">'.$row->name.'</td>  
            <td class="text-center">'.$row->goals.'</td> 
            <td class="text-center">'.$row->coefficient.'</td> 
            <td class="text-center">'.$row->points.'</td>   
            </tr> 
            '; 
             }     
        } 

        }
        else
        {
        $output = '
        <tr>
            <td align="center" colspan="5">Player not found</td>
        </tr>
        ';
        }
        $data = array(
        'table_data'  => $output,
        'total_data'  => $total_row
        ); 

        echo json_encode($data);
        }
        } 

     public function test(){

        //$player = Player::all();
        return view('public.stats');

     }
    public function index()
    {
        $post = Post::latest()->get();  
        //$cate = Category::where('id' , 'category_id')->get(); 
        $cate = DB::table('categories')
        ->join('posts', 'categories.id', '=', 'posts.category_id') 
        ->select('categories.*', 'posts.*')
        ->get(); 

        $player = Player::orderBy('market_value', 'DESC')->get();


        //$player = Player::all()->groupBy('market_value' ,'>', 0)->toArray();
 
        return view("welcome" , ["cate" => $cate , "post"  => $post , "player" => $player]); 

    }

    public function golden_boot ()
    {
          //$club = DB::table('players')
        //->join('clubs', 'clubs.id', '=', 'players.club_id') 
        //->select('clubs.*', 'players.*')
        //->get(); 

        //$plr = Player::where('club_id', $player->club->name)->first();

        //$player = Player::all();
      
        //$club = Club::where('id' , 'club_id')->orderBy('market_value')->get();

         //$player = Player::all();

         /*$club = DB::table('clubs')
         ->join('players', 'clubs.id', '=', 'players.club_id') 
         ->select('clubs.*', 'players.*')
         ->orderBy('market_value', 'DESC')
         ->get();*/
        
        



         $stat = Stat::orderBy('points' , 'DESC')->paginate(10);
        return view('public.stats' , ["stat" => $stat , "club" => $club]);
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

    public function select(){

        $country = Country::all();

        return view('select.club')->with('country' , $country);

    }

    public function get_club(Request $request){

        $club = Club::whereCountryId($request->country_id)->pluck('name','id');
        return response()->json($club);  
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
