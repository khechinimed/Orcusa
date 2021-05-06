<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/association', function () { return view('welcome'); });

Route::get('/evenements', function () { return view('welcome'); });

Route::get('/donation', function () { return view('welcome'); });

Route::get('/stream', function () { return view('welcome'); });

Route::get('/forum', function () { return view('welcome'); });

Route::get('/contact', function () { return view('welcome'); });



Route::get('/admin', function () {
    //
    return view('admin');
})->middleware('auth');

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('app/get_users', [UserController::class, 'getUsers']);
Route::post('app/create_user', [UserController::class, 'createUser']);
Route::post('app/edit_user', [UserController::class, 'editUser']);
Route::post('app/delete_user', [UserController::class, 'deleteUser']);

Route::post('app/upload', [UserController::class, 'upload']);
Route::post('app/delete_image', [UserController::class, 'deleteImage']);


//MailChimp pour newsletter
Route::post('/subscribe', [NewsletterController::class, 'subscribe']);