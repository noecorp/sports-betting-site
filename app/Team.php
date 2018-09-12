<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    public function players()
    {
        return $this->hasMany('App\Player');
    }

    public $timestamps= false;

    protected $fillable = ['name','country','flag','logo','victories','loses','StrikeRatio','SpareRatio' ];
}
