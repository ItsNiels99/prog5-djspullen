<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
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

Route::get('/products/create', function () {
    return view('products.create');
})->middleware(['auth', 'verified'])->name('products.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/create-product', 'create')->name('products.create');
    Route::post('/create-product', 'store')->name('products.store');
    Route::get('/edit-product/{product_id}', 'edit')->name('products.edit');
    Route::put('/update-product/{product_id}', 'update')->name('products.update');
    Route::delete('/delete-product/{product_id}', 'destroy')->name('products.destroy');
    Route::put('products/{product}/toggle-status', [ProductController::class, 'toggleStatus'])->name('products.toggleStatus');
});

Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews', 'index')->name('reviews.index');
    Route::get('/create-review', 'create')->name('reviews.create');
    Route::post('/create-review', 'store')->name('reviews.store');
    Route::get('/edit-review/{review_id}', 'edit')->name('reviews.edit');
    Route::put('/update-review/{review_id}', 'update')->name('reviews.update');
    Route::delete('/delete-review/{review_id}', 'destroy')->name('reviews.destroy');
});

require __DIR__.'/auth.php';
