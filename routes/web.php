<?php

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\Auth\LoginController;

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
    return view('pages.welcome', [
        'posts' => Post::with('source')->latest()->simplePaginate(30),
    ]);
});

// Post
Route::group(['prefix' => 'p'], function () {
    Route::get('{id}-{slug}', [PostController::class, 'show']);
});

// Source
Route::group(['prefix' => 's'], function () {
    Route::get('{slug}', [SourceController::class, 'show']);
});

// Authentication
Route::middleware('guest')->group(function () {
    Route::group(['prefix' => 'login'], function () {
        // Login page
        Route::get('/', function () {
            return view('pages.login');
        })->name('auth.login');

        // Login 0auth provider
        Route::get('{provider}', [LoginController::class, 'redirectToProvider']);
        Route::get('{provider}/callback', [LoginController::class, 'handleProviderCallback']);
    });
});

// Logout
Route::post('signout', [LoginController::class, 'logout'])->name('logout');
