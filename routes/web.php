<?php

use App\Http\Controllers\LinkController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
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

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::post('/link/set', [LinkController::class, 'set'])
    ->name('form.set-link');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('pages.dashboard');

    Route::get('/user', function () {
        return view('user');
    })->name('pages.user');
});

// должно быть последним
Route::get('/{token}', [LinkController::class, 'redirect'])
    ->withoutMiddleware(VerifyCsrfToken::class);
