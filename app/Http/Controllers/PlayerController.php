<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index()
    {
        $players = DB::table('players')
        ->join('teams','players.team_id', '=', 'teams.id')
        ->select('players.Pname', 'teams.name', 'teams.id as idT','players.id')
        ->get();
        //var_dump($players);
      return view('Player.index',compact('players'));
    }

    public function show($id)
    {
    
            //$players = Player::find($id);
            $players = DB::table('players')
                                ->join('teams', function($join) use ($id) {
                                    $join->on('players.team_id', '=', 'teams.id')
                                         ->where('players.team_id', '=', $id);
                                })
                                ->first();
            return view('Player.show',compact('players'));
    
    }
}
