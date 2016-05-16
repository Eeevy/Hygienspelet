<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Category';

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function addQuestion(Question $question){
        $this->questions()->save($question);
    }
}
