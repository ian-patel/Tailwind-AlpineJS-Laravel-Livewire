<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

/**
 * Authentication
 */
Route::middleware('guest')->group(function () {

    Route::layout('layouts.auth')->group(function () {
        Route::livewire('/login', 'auth.login')->name('auth.login');
        Route::livewire('/register', 'auth.register')->name('auth.register');
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
