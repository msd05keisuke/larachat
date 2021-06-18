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

Auth::routes();

Route::get('/', [App\Http\Controllers\ChatController::class, 'index'])->middleware('auth');
Route::get('/messages', [App\Http\Controllers\ChatController::class, 'fetchMessages'])->middleware('auth');
Route::post('/messages', [App\Http\Controllers\ChatController::class, 'sendMessage'])->middleware('auth');
Route::get('/getauth', [App\Http\Controllers\ChatController::class, 'getAuth'])->middleware('auth');
