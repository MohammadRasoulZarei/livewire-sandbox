<?php

use App\Http\Controllers\ChatController;
use App\Livewire\Auth\Index as AuthIndex;
use App\Livewire\Product\Create as CreateProduct;
use App\Livewire\Product\Index as ProductIndex;
use App\Livewire\Product\CartIndex ;
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

Route::get('/task',Task::class)->name('task');

Route::get('/login',AuthIndex::class)->name('login')->middleware('guest');
Route::get('/logout',function(){
    auth()->logout();
    return redirect('/');
});
Route::get('products',ProductIndex::class)->name('product.index');
Route::get('products/create',CreateProduct::class)->name('product.create');
Route::get('cart',CartIndex::class)->name('cart.index');
Route::get('chat',[ChatController::class,'index'])->name('chat.index');
Route::get('chat/{room:slug}',[ChatController::class,'showRoom'])->name('showRoom');
Route::get('/test',function(){
     \Cart::clear();
    // dd(\Cart::getContent());
    // return view('layouts.app');
});
