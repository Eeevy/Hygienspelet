<?php

namespace App;

use Illuminate\Database\Eloquent;

class Card extends Eloquent
{
    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function addNote(Note $note){

        $this->notes()->save($note);
    }
}
