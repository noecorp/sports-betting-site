<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('Team.index',compact('teams'));
    }

    public function show($id)
    {
    
            $teams = Team::find($id);

            $players = DB::table('players')
                                ->join('teams', function($join) use ($id) {
                                    $join->on('players.team_id', '=', 'teams.id')
                                         ->where('teams.id', '=', $id);
                                })
                                ->get();
    
            return view('Team.show',compact('teams','players'));

            
    
    }

}
