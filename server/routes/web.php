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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['page' => 'Accueil']);
});

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/login', function () {
    return view('user.login');
})->name('login');
Route::get('/register', function () {
    return view('user.register');
})->name('register');
Route::get('/complete-registration', 'Auth\RegisterController@completeRegistration');
Route::post('/2fa', function () {
    return redirect('panel');
})->name('2fa')->middleware('2fa');


Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::middleware(['auth', '2fa'])->group(function () {
    Route::get('/panel', 'PanelController@index')->name('panel');
    Route::post('/panel/create', 'ServiceController@create')->name('panel.create');
});