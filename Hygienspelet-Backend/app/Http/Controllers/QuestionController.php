<?php

namespace App\Http\Controllers;

use App\Category;
use App\QuestionPackage;
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
    $results = DB::table('questions')->get();
//        ->join('notes', 'cards.id', '=', 'card_id')
//        ->select('cards.*', 'cards.title', 'notes.body')->get();
        return $results;
    }

    /**
     * Creates a challenge with creator unit ID and Recievor unit ID,
     * skapa frågor
     * skapa utmaning,
     * returnera challenge_id och questionPackage
     * @param Request $request
     * @param $cr
     * @param $rc
     * @return string
     */
    public function createChallenge($cr, $rc){
        $questions = $this->getPackage();
        $package

        return  $package;
    }

    /**Returns a package of ten questions, now all columns
     * @return array|static[]
     */
    public function getPackage(){
        $package = DB::table('questions')
            ->join('Answers', 'questions.id', '=', 'Answers.question_id')
            ->select('*')->take(10)->get();
        return $package;
    }

    public function storePackage(QuestionPackage $p){
        $package = new QuestionPackage;
        return back();
    }

    public function getPackageData($id){
        $package = QuestionPackage::find($id);
        $questions = $package->questions;
        return $questions;
    }


}
