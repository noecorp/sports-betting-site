<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';

public function team()
{
    return $this->belongsTo('App\Team');
}

    public $timestamps= false;

    protected $fillable = ['Pname', 'Photo','team_id' ];
}
