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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/devices', [App\Http\Controllers\DevicesController::class, 'index'])->name('devs.index');

Route::post('/devices', [App\Http\Controllers\DevicesController::class, 'store'])->name('devs.add');
Route::get('/devices/{device}/edit', [App\Http\Controllers\DevicesController::class, 'edit'])->name('devs.edit');
Route::put('/devices/{device}', [App\Http\Controllers\DevicesController::class, 'update'])->name('devs.update');

Route::delete('/devices/{device}', [App\Http\Controllers\DevicesController::class, 'destroy'])->name('devs.destroy');

Route::get('/devices/{device}', [App\Http\Controllers\DevicesController::class, 'show'])->name('devs.show');

