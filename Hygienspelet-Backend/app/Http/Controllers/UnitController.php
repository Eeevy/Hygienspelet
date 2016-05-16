<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UnitController extends Controller
{
    //

    /**
     * Display all units
     * @return Response
     */
    public function getAll(){
       echo "get all units from DB";
//        $questions = \DB::table('questions')->get();
//        return compact('questions');
        return $units = \DB::table('Units')->get();
    }

    /**
     * Get data from specified unit
     * @param $id
     */
    public function getUnit($id){

       // echo "get data from unit with id= $id";

        $unit = \App\Unit::find($id);
        $challenges = \App\Challenge::where();

        return $challenges;
    }

    /**
     * Add unit to database
     * @param Request $request
     */
    public function add(Request $request){
        echo "Add request= $request";
    }

    /**
     * Remove unit with specified id
     * @param $id
     */
    public function remove($id){
        echo "Remove unit with id=$id";
    }
}
