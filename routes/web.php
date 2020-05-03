<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('admin', 'AdminController@index')->name('admin');
    Route::post('/UserEdit', 'AdminController@userEdit');
    Route::post('/UserDelete', 'AdminController@userDestroy');
});


Route::group(['middleware' => ['auth', 'agent']], function () {
    Route::get('agent', 'AgentController@index')->name('agent');
    Route::get('agent/details', 'AgentController@details');
    Route::post('/insert', 'AgentController@policyAdd');
    Route::post('/edit', 'AgentController@policyEdit');
    Route::post('/search', 'AgentController@policySearch');
    Route::post('/delete', 'AgentController@policyDestroy');
    Route::post('/pdf', 'AgentController@pdfGen');
    Route::get('/profile', 'AgentController@userProfile');
    Route::post('/update', 'AgentController@userEdit');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
