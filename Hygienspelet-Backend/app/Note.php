<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model


{
    protected $fillable = ['body']; //betyder att användaren kan fylla i denna med många tecken

    public function card(){
        return $this->belongsTo{Card::class};
    }
}
