<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Card;
use App\Note;

class CardsController extends Controller
{
    

    public function index(){
//        $cards = \DB::table('cards')->get();
        
        //Eloquent
        $cards = Card::all();
        return view('cards.index', compact('cards'));
    }

    public function show(Card $card){
        return view('cards.show', compact('card'));
    }

    /**
     * Add note to card
     * @param Request $request
     * @param Card $card
     * @return mixed
     */
    public function store(Request $request, Card $card){

//Aproach #1
//        $note = new Note;
//        $note->body = $request->body;
//        $card->notes()->save($note);

//approach #2 -- need to use fillable in the Note class
//        $note = new Note(['body' => $request->body]);
//        $card->notes()->save($note);

//Approach #3 --need to use fillable in the Note class
//        $card->notes()->save(
//            new Note(['body' => $request->body])
//        );

        //Approach #4
//        $card->notes()->create([
//          'body' => $request->body
//      ]);

        //Approach #5
//        $card->notes()->create($request->all());

        $card->addNote(
            new Note($request->all())
        );


        return back();



    }


//    public function show($id){
//
//        $card = \App\Card::find($id);
//        return view('cards.index', compact('card'));
//    }

    //Route::get('/highscores', 'DataController');
//
//Route::get('/', function () {
//
//    $people = ['Emma', 'Matt', 'Evelyn'];
//
//   // return View::make();
//    //return view('welcome', ['people' => $people]);
//    return view('welcome', compact('people'));
//});

//Route::get('/', function(){
//
//   //return View::make('welcome', array('name' => 'Emms'));//alternatil #1
//   return View::make('welcome') ->with('name', 'Bullen');//alternativ #2
//   //return View::make('welcome') ->withName('Bullen');//alternativ #3
//
//
//
//});

//Route::get('/', function(){
//
//   return View::make('welcome') ->with('name', 'Bullen');//alternativ #2
//
//
//
//});

///**
// * ? after name means optional. = stranger means that it will print stranger if a aprameter is not given
// */
//Route::get('/hello/{name?}', function($name = 'stranger'){
//   return View::make('welcome')->with('name', $name);
//});

//Route::get('/printdata', function(){
//   $data =
//       ['name' => 'Jane',
//           'email' => 'jane@doe.com',
//       'location' => 'florida'];
//
//   return View::make('welcome')-> withData($data);
//});

//Route::get('/', 'TodoListController@index');

//Route::get('/todos', 'TodoListController@index');
//
//Route::get('/todos/{id}', 'TodoListController@show');

//Route::resource('todos', 'TodoListController');

//Route::get('/db', function(){
//   return DB::select('select database();');
//});


//Route::get('/', 'PagesController@home');
//
//Route::get('about', 'PagesController@about');
//
//Route::get('cards', 'CardsController@cards');

}
