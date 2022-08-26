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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::resource('projet', 'ProjetController')->middleware('auth');
Route::resource('employe', 'EmployeController')->middleware('auth');
Route::resource('contrat', 'ContratController')->middleware('auth');
Route::resource('type-conge', 'TypeCongeController')->middleware('auth');
Route::resource('conge', 'CongeController')->middleware('auth');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
