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
     * Remove the specified resource
     * @return int $id
     * @return Response
     */
    public function destroyQuestion(){
        //Remove question from database
        return "Question removed";
    }


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

    public function getQuestion($id){

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
        $package = new \App\QuestionPackage;
        $packageId = $package->all(array('id'));

        $question = \App\Question::first();
//        \App\Challenge::create(array('unit_1_id' => $cr, 'unit_2_id' => $rc, 'questionPackage_id' => $package->id));


        return  $packageId;
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

    public function storePackage(Request $p){
        $package = new QuestionPackage;
        return back();
    }

    /**
     * Get packageData for specified id
     * @param $id
     * @return mixed
     */
    public function getPackageData($id){
        $package = \App\QuestionPackage::with('questions')->get();
        return $package;
    }

    public function getActiveChallenges($unitid){
        $challenge = \App\Challenge::limit(10)->where('is_active', '=', 1)
            ->where('unit_1_id', '=', $unitid)->get();
        return $challenge;
    }

    public function getFinishedChallenges($unitid){
        $challenge = \App\Challenge::limit(10)->where('is_active', '=', 0)
            ->where('unit_1_id', '=', $unitid)->get();
        return $challenge;
    }

    public function listen(){
        DB::listen(function($query){
            var_dump($query->sql);
        });
    }
    
    
    

}
