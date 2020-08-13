<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('home', ['page' => 'Accueil']);
});
Route::get('/login', function () {
    return view('user.login', ['page' => 'Connexion']);
})->name('login');
Route::get('/register', function () {
    return view('user.register', ['page' => 'Créer un compte']);
})->name('register');
Route::middleware('auth')->get('/panel', function () {

})->name('panel');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
