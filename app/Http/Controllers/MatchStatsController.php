<?php

namespace App\Http\Controllers;

use App\MatchStats;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MatchStatsController extends Controller
{
    public function display($match) {
        $matchStats = DB::table('matchs')
                                ->join('matchstats', function($join) use ($match) {
                                    $join->on('matchs.id', '=', 'matchstats.Match_id')
                                         ->where('matchs.id', '=', $match);
                                })
                                ->first();
        return view('matchstats',compact('matchStats'));
    }    
}