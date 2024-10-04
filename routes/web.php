<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReadingBookController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Localization;
// use App\Models\Book;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/localization/{locale}', function (string $locale) {
    if (!in_array($locale, config('localization.locales'))) {
        abort(400);
    }

    session(['localization' => $locale]);
    return redirect()->back();
})->name('localization');

Route::middleware(Localization::class)
    ->group(function () {
        Route::get('/', function () {
            $bookes=Book::all();
            $catigores = Category::all();
            return view('welcome',compact('bookes','catigores'));
        })->middleware(['auth', 'verified']);
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::get('/set', [UserController::class, 'setadmin'])->name('user.set');
            Route::post('/readingbook/store', [ReadingBookController::class, 'store'])->name('readingbook.store');
            Route::get('/allbook', [BookController::class, 'allindex'])->name('allbook.index');


        });
        Route::group(['middleware' => ['role:admin','auth']], function () {
            Route::get('/user', [UserController::class, 'index'])->name('user.index');
            Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
            Route::post('/category', [CategoryController::class, 'store'])->name('categories.store');
            Route::put('/category/{category}', [CategoryController::class, 'update'])->name('categories.update');
            Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
            
            Route::get('/booke', [BookController::class, 'index'])->name('booke.index');
            Route::post('/booke', [BookController::class, 'store'])->name('books.store');
            Route::put('/booke/{book}', [BookController::class, 'update'])->name('books.update');
            Route::delete('/booke/{book}', [BookController::class, 'destroy'])->name('books.destroy');
            
            Route::get('/read', [ReadingBookController::class, 'index'])->name('read.index');
            Route::put('/read/{read}', [ReadingBookController::class, 'update'])->name('reads.update');
            Route::delete('/read/{read}', [ReadingBookController::class, 'destroy'])->name('reads.destroy');
        });
        require __DIR__ . '/auth.php';

    });


