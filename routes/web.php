<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Voyager;

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
    return view('login');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('home', ['uses' => 'App\Http\Controllers\CalendarController@adminP', 'as' => 'home']);

});
Route::get('users', ['uses' => 'App\Http\Controllers\CommuneController@showUsers', 'as' => 'showUsers']);
Route::get('projects', ['uses' => 'App\Http\Controllers\CommuneController@showProjects', 'as' => 'showProjects']);
Route::get('calendar', ['uses' => 'App\Http\Controllers\CalendarController@index', 'as' => 'index']);
Route::get('home', ['uses' => 'App\Http\Controllers\CalendarController@adminP', 'as' => 'home']);
Route::get('circonscription', ['uses' => 'App\Http\Controllers\CommuneController@getCirconscription', 'as' => 'circonscription']);

