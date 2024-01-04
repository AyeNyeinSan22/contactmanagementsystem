<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ContactController::class,'index']);

Route::get('/contacts',[ContactController::class,'index']);
Route::get('/contacts/detail/{id}' , [ContactController::class,'detail']);

Route::get('/contacts/add',[ContactController::class,'add']);
Route::post('/contacts/add',[ContactController::class,'create']);

Route::get('/contacts/edit/{id}',[ContactController::class,'edit']);
Route::post('/contacts/edit/{id}',[ContactController::class,'update']);
Route::get('/contacts/delete/{id}',[ContactController::class,'delete']);
Route::get('/contacts/show/{title}',[ContactController::class,'showContactByTitle']);
Route::get('/contacts/deleteAll', 'ContactController@deleteAll')->name('contacts.deleteAll');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
