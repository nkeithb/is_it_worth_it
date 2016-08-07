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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/spending_page', [ 'middleware' => 'auth', 'uses' => 'UserSpendingController@userSpendingPage']);

Route::post('/submit_plan', ['middleware' => 'auth', 'uses' => 'UserSpendingController@addSpendingPlan']);

Route::get('/delete_plan/{id}', ['middleware' => 'auth', 'uses' => 'UserSpendingController@deleteSpendingPlan']);

Route::get('/spending_plan/{id}', ['middleware' => 'auth', 'uses' => 'UserSpendingController@updateSpendingPlanPage']);

Route::post('/update_plan/{id}', ['middleware' => 'auth', 'uses' => 'UserSpendingController@updateSpendingPlan']);
