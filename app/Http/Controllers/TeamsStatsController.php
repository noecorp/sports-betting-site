<?php

namespace App\Http\Controllers;

use App\TeamsStats;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeamsStatsController extends Controller
{
    public function index()
{
    $stats= DB::table('teams');
}

    
}
