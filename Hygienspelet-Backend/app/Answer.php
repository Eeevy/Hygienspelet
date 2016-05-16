<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'Answers';

    public $timestamps = false;


    public function question(){
        return $this->belongsTo(Question::class, 'question_id');
    }
}
