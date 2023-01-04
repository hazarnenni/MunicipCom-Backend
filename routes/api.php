<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/infos', 'App\Http\Controllers\CommuneController@showInfo');
Route::get('/service', 'App\Http\Controllers\CommuneController@showServices');
Route::get('/service/{id}', 'App\Http\Controllers\CommuneController@getServicebyId');
Route::get('/events', 'App\Http\Controllers\EventsController@index');
Route::get('/events/{id}', 'App\Http\Controllers\EventsController@getEventbyId');
Route::get('/contacts', 'App\Http\Controllers\ContactController@index');
Route::post('/addcontact', 'App\Http\Controllers\ContactController@addContact');
Route::get('/news', 'App\Http\Controllers\NewsController@index');
Route::get('/news/{id}', 'App\Http\Controllers\NewsController@getNewsbyId');
Route::get('/albums', 'App\Http\Controllers\Albums@show');
Route::get('/history', 'App\Http\Controllers\HistoryController@index');
Route::resource('forms', FormController::class);
//Route::post('/login', 'App\Http\Controllers\AuthController@login');
//Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::get('/projects', 'App\Http\Controllers\ProjectController@index');
Route::get('/projects/{id}', 'App\Http\Controllers\ProjectController@getProjectbyId');
Route::post('/addvote', 'App\Http\Controllers\ProjectController@addVote');
Route::post('/addfolder', 'App\Http\Controllers\FolderController@add');
Route::get('/files', 'App\Http\Controllers\CommuneController@showFiles');
Route::get('/circonscription', 'App\Http\Controllers\CommuneController@showCirconscription');

 Route::group([
    'middleware' => 'api',
     'prefix' => 'auth'

 ], function ($router) {
     Route::post('login', 'App\Http\Controllers\AuthController@login');
     Route::post('register', 'App\Http\Controllers\AuthController@register');
     Route::post('logout', 'App\Http\Controllers\AuthController@logout');
     Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
     Route::get('user-profile', 'App\Http\Controllers\AuthController@userProfile');
 });
