<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeResult extends Model
{
    protected $table = 'Challenges_Result';

    public function challenges(){
        return $this->hasMany(Challenge::class);
    }

    public function addChallenge(Challenge $challenge){
        $this->challenges()->save($challenge);
    }
}
