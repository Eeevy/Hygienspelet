<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



//*******TEST




Route::group( [ 'middleware' => ['web']], function() {
    Route::get('cards', 'CardsController@index');


    Route::get('cards/{card}', 'CardsController@show');


    Route::post('cards/{card}/notes', 'CardsController@store');

    Route::post('check/{question_id}', 'QuestionController@check');




});
// * * * * * * PagesController * * * * * * 
/**
 * Display startpage
 * @Response
 */
Route::get('/', 'PagesController@start');

/**
 * Displays contact page
 */
Route::get('/contact', 'PagesController@contact');



// * * * * * * QuestionController * * * * * * *

Route::get('/admin', 'QuestionController@create');

/**
 * Store question info in database * * * **NOT IMPLEMENTED
 */
Route::post('/admin/store', 'QuestionController@store');

Route::get('getquestions', 'QuestionController@getQuestions');

Route::get('getpackage', 'QuestionController@getPackage');

/**
 * Delete question with specified id * * * *NOT IMPLEMENTED
 */
//Route::delete('/admin/delete/{id}', 'QuestionController');



// * * * * *  * HighscoreController * * * * * *
/**
 * Display highscores in view
 */
Route::get('/highscore/view', 'HighscoreController@highscoreView');

/**
 * Get highscore from database, return list
 */
Route::get('/highscore/list', 'HighscoreController@highscoreList');



//* * * * * ** UnitController * * * ** * ** * *

Route::get('/units/all', 'UnitController@getAll');

/**
 * Store new unit * * ** * * * * * * * *NOT IMPLEMENTED
 */
//Route::post('/unit', 'UnitController@add');

/**
 * Get data from specified unid id
 */
Route::get('/unit/{id}', 'UnitController@getUnit');

//Route::delete('/delete/unit/{id}', 'UnitController@remove');


 
