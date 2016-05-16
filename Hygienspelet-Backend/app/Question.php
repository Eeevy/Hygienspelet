<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model 
{
    protected $table = 'questions';
    protected $fillable = ['questionText'];//allows to fill this column

    public $timestamps = false;

    public function answer(){
        return $this->hasOne(Answer::class);
    }

    public function category(){
        return $this->hasOne(Category::class);
    }
    


}
