<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HighscoreController extends Controller
{
    //

    public function listHighscores(){
        //get and return highscores from database
        return view('highscore');
    }
}
