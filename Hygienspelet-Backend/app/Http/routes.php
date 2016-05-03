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

//* * * * * *TA BORT DETTA NEDAN INNAN DU PUSHAR EMMA!!!!

Route::get('/', 'TodoListController@index');











// * * * * * * PagesController * * * * * * 
/**
 * Display startpage
 * @Response
 */
//Route::get('/', 'PagesController@start');

/**
 * Displays contact page
 */
Route::get('/contact', 'PagesController@contact');



// * * * * * * QuestionController * * * * * * *

Route::get('/admin', 'QuestionController@create');
/**
 * Store question info in database
 */
Route::put('/admin/store', 'QuestionController@store');

/**
 * Delete question with specified id
 */
//Route::delete('/admin/delete/{id}', 'QuestionController');



// * * * * *  * HighscoreController * * * * * *
/**
 * Display highscores
 */
Route::get('/highscores', 'HighscoreController@listHighscores');

Route::get('/db', function(){
    $lists =  DB::table('Todo_lists')->get();
    foreach ($lists as $list){
        echo "<li>".$list->Name."</li>";
    }
});


 
