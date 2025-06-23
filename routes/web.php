<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::post('/logout',[UserController::class, 'logout']);

Route::get('/home', function () {
    return view('home');
});

Route::post('/submit-loa', [UserController::class, 'submitLoa'])->name('submit.loa');

Route::get('/fileALoa', [UserController::class, 'showFileALoa'], function () {
    return view('fileALoa');
});
Route::get('/listOfLOA', function () {
    return view('listOfLOA');
});
Route::get('/loaDetails', function () {
    return view('loaDetails');
});
Route::get('/approachingTheDeadline', function () {
    return view('approachingTheDeadline');
});
Route::get('/overdue', function () {
    return view('overdue');
});


Route::get('/submitter', function () {
    return view('submitter');
});
Route::get('/register', [UserController::class, 'create'], function () {
    return view('register');
});


Route::post('/login',[UserController::class, 'login']);
Route::post('/register',[UserController::class, 'register']);

Route::get('/approaching-deadline', [DeadlineController::class, 'index'])->name('deadline.index');
Route::get('/approaching-deadline/data', [DeadlineController::class, 'getData'])->name('deadline.data');

