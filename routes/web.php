<?php

use App\Livewire\Auth\Index as AuthIndex;
use App\Livewire\Tasks\Task;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
})->middleware('auth')->name('home');
Route::get('/login',AuthIndex::class)->name('login')->middleware('guest');
Route::get('/task',Task::class)->name('task');
Route::get('/logout',function(){
    auth()->logout();
    return redirect('/');
});
