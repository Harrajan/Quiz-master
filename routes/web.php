<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

// Quiz routes
Route::get('/quiz/create', 'QuizController@create');
Route::post('/quiz/store', 'QuizController@store');
Route::post('/quiz/{quiz}/update', 'QuizController@update');
Route::get('/quiz/{quiz}/edit', 'QuizController@edit');
Route::delete('/quiz/{quiz}/delete', 'QuizController@destroy');
Route::get('/quiz/{quiz}', 'QuizController@show')->name('quiz');

// Question routes
Route::get('/questions/create', 'QuestionController@create');
Route::post('/questions/store', 'QuestionController@store');
Route::get('/questions/{question}/edit', 'QuestionController@edit');
Route::post('/questions/{question}/update', 'QuestionController@update');
Route::delete('/questions/{question}/delete', 'QuestionController@destroy');
