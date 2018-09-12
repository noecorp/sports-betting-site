<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use Illuminate\Http\Request;
use App\Team;
use App\Player;
use Illuminate\Support\Facades\DB;

class AdminTeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('Team.admin.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Team.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

            'name' => 'required',

            'country' => 'required',

            'flag'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        Team::create($request->all());

        $team = Team::where('name', 'like', $request->name)->select('teams.*')->first();

        $flagName = $team->id.'_flag'.time().'.'.request()->flag->getClientOriginalExtension();

        $logoName = $team->id.'_logo'.time().'.'.request()->logo->getClientOriginalExtension();
        
        $request->flag->storeAs('flags',$flagName);

        $request->logo->storeAs('logos',$logoName);

        $team->flag = $flagName;

        $team->logo = $logoName;

        $team->save();

        return redirect()->route('adminteam.index')

                        ->with('success','Team created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
            $teams = Team::find($id);

            $players = DB::table('players')
                                ->join('teams', function($join) use ($id) {
                                    $join->on('players.team_id', '=', 'teams.id')
                                         ->where('teams.id', '=', $id);
                                })
                                ->get();
    
            return view('Team.admin.show',compact('teams','players'));
    
    }
        /**
    
         * Show the form for editing the specified resource.
    
         *
    
         * @param  int  $id
    
         * @return \Illuminate\Http\Response
    
         */
    
        public function edit($id)
    
        {
    
            $teams = Team::find($id);
    
            return view('Team.admin.edit',compact('teams'));
    
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
    
                'name' => 'required',

                'country' => 'required',
    
                'flag'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
            ]);
            
            $team = Team::find($id);

            $flagName = $team->id.'_flag'.time().'.'.request()->flag->getClientOriginalExtension();

            $logoName = $team->id.'_logo'.time().'.'.request()->logo->getClientOriginalExtension();

            $request->flag->storeAs('flags',$flagName);

            $request->logo->storeAs('logos',$logoName);
            
            $team->flag = $flagName;

            $team->logo = $logoName;

            Team::find($id)->update($request->all());

            $team->save();

            return redirect()->route('adminteam.index')
    
                            ->with('success','Team updated successfully');
    
        }
    
    
        /**
    
         * Remove the specified resource from storage.
    
         *
    
         * @param  int  $id
    
         * @return \Illuminate\Http\Response
    
         */
    
        public function destroy($id)
    
        {
    
            Team::find($id)->delete();
    
            return redirect()->route('adminteam.index')

                            ->with('success','Team deleted successfully');
    
        }
    }


