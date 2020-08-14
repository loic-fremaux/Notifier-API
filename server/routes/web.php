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

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
    Route::get('/panel/delete/{id}', function (App\Service $id) {
        $id->delete();
        return redirect('panel');
    })->name('panel.delete');
    Route::post('/panel/adduser/{id}', function (App\Service $id, Request $request) {
       return ServiceController::addUser($id, $request);
    })->name('panel.adduser');
    Route::post('/panel/deluser/{service_id}/{user_id}', function (App\Service $service_id, $user_id, Request $request) {
        return ServiceController::delUser($service_id, $user_id);
    })->name('panel.deluser');

    Route::post('/user/add-token', function (Request $request) {
        return UserController::addToken($request);
    });
});