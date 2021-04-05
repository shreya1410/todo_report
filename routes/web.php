<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

Route::get('my-todo',[TodoController::class,'getAllTodos'])->name('home');

Route::post('/save-todo',[TodoController::class,'store'])->name('todo.store');

Route::post('/delete-todo',[TodoController::class,'destroy'])->name('todo.destroy');

Route::put('/update-todo',[TodoController::class,'update'])->name('todo.update');

Route::get('/edit-todo/{id}',[TodoController::class,'edit'])->name('todo.edit');
