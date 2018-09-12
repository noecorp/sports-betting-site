<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        //$match = Match::all();
        $match = DB::table('matchs')
        ->join('teams as T','matchs.Team_1', '=', 'T.id')    
        ->join('teams as T2','matchs.Team_2', '=', 'T2.id')
        ->select('matchs.id', 'matchs.ScoreBoard','matchs.Placement','matchs.Winner','matchs.Team_1 as id1','matchs.Team_2 as id2','T.name as name1','T2.name as name2')
        ->get();
        // var_dump($match);
        //  exit();
        return view('Match.index',compact('match'));
    }
    
    
    public function show($id) {
        
        $match = DB::table('matchs')
        ->join('teams as T','matchs.Team_1', '=', 'T.id')    
        ->join('teams as T2','matchs.Team_2', '=', 'T2.id')
        ->select('matchs.ScoreBoard','matchs.Placement','matchs.Winner','matchs.Team_1 as id1','matchs.Team_2 as id2','T.name as name1','T2.name as name2')
        ->where('matchs.id', '=', $id)
        ->first();
        
        //var_dump($match);
         //exit();
        return view('Match.show',compact('match'));
    }

    public function bet() {
        return redirect()->route('Match.index')
                         ->with('success','Bet validate !');
    }
}