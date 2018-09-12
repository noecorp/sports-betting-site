<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use Illuminate\Http\Request;
use App\Player;
use App\Team;
use Illuminate\Support\Facades\DB;

class AdminPlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = DB::table('players')
        ->join('teams','players.team_id', '=', 'teams.id')
        ->select('players.Pname', 'teams.name','players.id', 'players.photo')
        ->get();
        //var_dump($players);
      return view('Player.admin.index',compact('players'));

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        $select=[];
            foreach($teams as $team){
                    
     $select[$team->id]= $team->name;}
                
     
        //var_dump($select);
        return view('Player.admin.create',compact('select'));
            }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // echo 'store';
        request()->validate([

            'Pname' => 'required',

            'team_id' => 'required',

            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
     
        Player::create($request->all());
//echo'create';
        $player = Player::where('Pname', 'like', $request->Pname)->select('players.*')->first();
   
        $photoName = $player->id.'_photo'.time().'.'.request()->photo->getClientOriginalExtension();

        $request->photo->storeAs('photos',$photoName);

        $player->photo = $photoName;

        $player->save();

        return redirect()->route('adminplayer.index')

                        ->with('success','Player created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
            //$players = Player::find($id);
            $players = DB::table('players')
                                ->join('teams', function($join) use ($id) {
                                    $join->on('players.team_id', '=', 'teams.id')
                                         ->where('players.team_id', '=', $id);
                                })
                                ->first();
            return view('Player.admin.show',compact('players'));
    
    }
        /**
    
         * Show the form for editing the specified resource.
    
         *
    
         * @param  int  $id
    
         * @return \Illuminate\Http\Response
    
         */
    
        public function edit($id)
    
        {
    
            $players = Player::find($id);
            $teams = Team::all();
            $select=[];
            foreach($teams as $team){
                    
            $select[$team->id]= $team->name;}
    
            return view('Player.admin.edit',compact('players','select'));
    
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
    
            request()->validate([
    
                'Pname' => 'required',

                'team_id' => 'required',
    
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            Player::find($id)->update($request->all());

            $player = Player::find($id);

            $photoName = $player->id.'_flag'.time().'.'.request()->photo->getClientOriginalExtension();

            $request->photo->storeAs('photos',$photoName);

            $player->photo = $photoName;

            $player->save();
    
            return redirect()->route('adminplayer.index')
    
                            ->with('success','Player updated successfully');
    
        }
    
    
        /**
    
         * Remove the specified resource from storage.
    
         *
    
         * @param  int  $id
    
         * @return \Illuminate\Http\Response
    
         */
    
        public function destroy($id)
    
        {
    
            Player::find($id)->delete();
    
            return redirect()->route('adminplayer.index')

                            ->with('success','Player deleted successfully');
    
        }
    }


