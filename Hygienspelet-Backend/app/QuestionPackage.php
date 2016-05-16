<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionPackage extends Model

{
    public $timestamps = false;

    protected $table = 'QuestionPackages';

    public function questions(){
        return $this->hasMany(Question::class);
//        return \App\Question::where('ID', $this->question_id)->first()->Question;

    }

    public function addQuestion(Question $question){
        return $this->questions()->save($question);
    }

    public function challenge(){
        return $this->belongsTo(Challenge::class);
    }
}
