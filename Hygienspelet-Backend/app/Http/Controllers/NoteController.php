<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NoteController extends Controller
{
    public function store(Request $request){

        return $request->all();

    }
}
