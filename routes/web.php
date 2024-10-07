<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function (Request $request) {
    return Inertia::render('Problem/Index', [
        'filters' => $request->all()
    ]);
})->name('problems.index');

Route::get('/problems/{slug}/description', function (Request $request) {
    return Inertia::render('Problem/Show', [
        'filters' => $request->all()
    ]);
})->name('problems.show');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
