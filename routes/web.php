<?php

use App\Http\Controllers\Test\testController;
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
    return view('test');
});


Route::get('/live-link', [testController::class, 'index'])->name('live-link');
// Route::get('/live-link', App\Livewire\ProductPost::class)->name('live-link');
