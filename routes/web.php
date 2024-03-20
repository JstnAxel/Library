<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('books', BooksController::class);
Route::resource('publisher', PublisherController::class);
Route::resource('authors', AuthorsController::class);
               

Route::get('/dashboard', [BooksController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/publisher', [PublisherController::class, 'index'])->middleware(['auth', 'verified'])->name('publisher');
Route::get('/authors', [AuthorsController::class, 'index'])->middleware(['auth', 'verified'])->name('authors');

Route::get('/search', [BooksController::class, 'search'])->name('search');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
