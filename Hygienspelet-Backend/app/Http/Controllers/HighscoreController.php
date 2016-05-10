<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


class HighscoreController extends Controller
{
    //

    /**
     * Display a view with highscores
     * @return mixed
     */
    public function highscoreView(){
        //get and return highscores from database --CHANGE TO HIGHSCORE TABLE
        //Here I created a model in sync with eloquent
        $highscores = \App\Question::all();
        return view('highscore', compact('highscores'));
    }

    public function highscoreList(){
        $lists =  \DB::table('questions')->get();
        return compact('lists');

    }
}
