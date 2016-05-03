<?php

namespace App\Http\Controllers;


class PagesController extends Controller
{
    /**
     * Displays the startpage
     * @return Response
     */
    public function start(){
        return view('basic');
    }

    /**
     * Display the contact page
     * @return mixed
     */
    public function contact(){
        return view('contact');
    }
    

    
}


