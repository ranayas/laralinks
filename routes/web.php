<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::name('dashboard.')->group(function () {
            Route::resource('links', LinkController::class);
            Route::resource('users', UserController::class, ['only' => ['edit', 'update']]);
        });
    });
});

Route::post('/visits/{link}', [VisitController::class, 'store'])->name('visits.create');

require __DIR__.'/auth.php';

Route::get('/{user}', [UserController::class, 'show']);
