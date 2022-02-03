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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/account', [App\Http\Controllers\UserController::class, 'show'])->name('account');
Route::get('/account/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('account-edit');
Route::post('/account/update', [App\Http\Controllers\UserController::class, 'update'])->name('account-update');
Route::post('/account/updatePassword', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('account-updatePassword');



                    //Message routes //
Route::resource("/message" , App\Http\Controllers\MessageController::class ); 


                     //comment  routes //
Route::resource("/comment" , App\Http\Controllers\CommentController::class )->except("create"); 