<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use Illuminate\Routing\Route;

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

//Route::middleware(['auth'])->group(function (){
    Route::resource('/todo', TodoController::class);

    Route::put('/todos/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');
    Route::delete('/todos/{todo}/incomplete', [TodoController::class, 'incomplete'])->name('todo.incomplete');

//});


Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload', [UserController::class, 'uploadAvatar']);

Route::get('/user' ,  [UserController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
