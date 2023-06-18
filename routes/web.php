<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackController;
use App\Models\Track;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterpreterController;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('tracks',TrackController::class)->middleware(['auth']);

require __DIR__.'/auth.php';

Route::get('tracks/{track}/play', [TrackController::class, 'play'])->name('tracks.play');

Route::get('tracks/{track}/edit', [TrackController::class, 'edit'])->name('tracks.edit');
Route::put('tracks/{track}', [TrackController::class, 'update'])->name('tracks.update');

Route::delete('/tracks/{track}', [TrackController::class, 'destroy'])->name('tracks.destroy');

Route::resource('artists', ArtistController::class)->middleware(['auth']);

// ...

Route::middleware('auth')->group(function () {
    // Rutas para las canciones
    //Route::resource('tracks', TrackController::class);

    // Rutas para los intérpretes
    Route::get('interpreters', [InterpreterController::class, 'index'])->name('interpreters.index');
    Route::get('interpreters/create', [InterpreterController::class, 'create'])->name('interpreters.create');
    Route::post('interpreters', [InterpreterController::class, 'store'])->name('interpreters.store');
    Route::delete('interpreters/{interpreter}', [InterpreterController::class, 'destroy'])->name('interpreters.destroy');
    Route::get('/interpreters/{interpreter}/edit', [InterpreterController::class, 'edit'])->name('interpreters.edit');
    Route::put('/interpreters/{interpreter}', [InterpreterController::class, 'update'])->name('interpreters.update');
});

// ...

