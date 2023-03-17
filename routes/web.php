<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'index'])->name('pages.index');

Route::post('/link/set', [LinkController::class, 'set'])
    ->name('form.set-link');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('pages.dashboard');
    Route::get('/user', [PageController::class, 'user'])->name('pages.user');
    Route::get('/links',  [PageController::class, 'links'])->name('pages.links');
    Route::get('/stats',  [PageController::class, 'stats'])->name('pages.stats');
});

// должно быть последним
Route::get('/{token}', [LinkController::class, 'redirect'])
    ->withoutMiddleware(VerifyCsrfToken::class);
