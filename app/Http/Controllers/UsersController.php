<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users' , User::all());
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeAdmin(User $user)
    {
       $user->role = "admin";
       $user->save(); 

       return redirect(route("users.index"));
    }

    public function makeWriter(User $user)
    {
       $user->role = "writer";
       $user->save(); 

       return redirect(route("users.index"));
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
    public function edit(User $user , Profile $profile)
    {
        $profile = $user->profile;
       return view('users.profile' , ["user" => $user , "profile" => $profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $profile = $user->profile;
        //dd($request->all());
        $data  = $request->all();
        if($request->hasFile("picture")){

            $picture  = $request->picture->store('profilePicture' , 'public'); 
            $data["picture"] = $picture;
        }
        $profile->update($data);
        return redirect(route('home'));
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
