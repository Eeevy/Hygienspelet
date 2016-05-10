<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;

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
    public function store(Request $request){
        $question = new Question;
        $question->questionText = $request->body;
        $question->save();
        return back();
//        return $request->all();

    }

    /**
     * Checking input to value in table
     * @param Request $request
     * @return array|string
     */
    public function check(Request $request, $id){
//        $name = Input::get('name');
        $result = 'Wrong answer';
        $value = $request->get('body');
        $answer = DB::table('questions')
            ->where('id', '=', $id)->pluck('questionText');
        $answer = $answer[0];
        if($answer == $value){
            return 'Correct!';
        }
        return $answer;
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

    /**
     * Get one question from DB
     */
//    public function getQuestions(){
////        return "get questions";
//        $questions = DB::table('question')->get();
//        return (compact('questions');
////        return view('highscore', compact('questions'));
//    }

    /**
     * Same as above but using model
     * @return mixed
     */
    public function getQuestions(){
    $results = DB::table('cards')
        ->join('notes', 'cards.id', '=', 'card_id')
        ->select('cards.*', 'cards.title', 'notes.body')->get();
        return $results;
    }


}
