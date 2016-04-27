<?php

namespace App\Http\Controllers;


class PagesController extends Controller
{
    public function home(){
        $people = array("Emma", "David", "Sara", "Evelyn", "Andreas");
        
        return view('welcome', compact('people'));
    }

    public function about(){
        return view('about');
    }
}


