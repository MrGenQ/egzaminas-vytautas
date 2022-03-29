<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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
//Main functions
Route::get('/', [MainController::class, 'index']);
Route::get('/add-task', [MainController::class, 'addTask']);
Route::post('/store-task', [MainController::class,'storeTask']);
Route::get('/update/{task}', [MainController::class, 'updateTask']);
Route::post('/update/{task}', [MainController::class, 'storeUpdate']);
Route::get('/update/client/{task}', [MainController::class, 'updateClientTask']);
Route::post('/update/client/{task}', [MainController::class, 'storeClientUpdate']);
Route::get('/delete/{task}', [MainController::class, 'deleteTask']);

//Authentication
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
