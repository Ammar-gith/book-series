<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Modules\Book\App\Http\Controllers\BookController;

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

Route::group([], function () {
    Route::resource('book', BookController::class)->names('book');
});


// Routes for Book Modules
Route::group(['middleware' => ['auth']], function () {
    Route::get('index', [BookController::class, 'index'])->name('book.index');
    Route::get('books', [BookController::class, 'book'])->name('book.books');
    Route::get('create-books', [BookController::class, 'create'])->name('book.create');
    Route::post('store-books', [BookController::class, 'store'])->name('book.store');
    Route::get('edit-book/{id}', [BookController::class, 'edit'])->name('book.edit');
    Route::post('update-book/{id}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/delete-book/{id}', [BookController::class, 'destroy'])->name('delete.book');

    Route::post('projects/media', [BookController::class, 'storeMedia'])->name('projects.storeMedia');
});