<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class QuestionController extends Controller
{
    //
    /**
     * Show the form for creating a new resource (question)
     * @return Response
     */
    public function create(){
        return view('AddQuestion');
    }

    /**
     * Store a newly created resource in storage
     * @return Response
     */
    public function store(){
        return "Question stored";
        //Store question in database here

    }
    
    /**
     * Remove the specified resource
     * @return int $id
     * @return Response
     */
    public function destroyQuestion(){
        //Remove question from database
        return "Question removed";
    }
}
