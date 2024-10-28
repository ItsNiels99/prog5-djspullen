<?php

use App\Http\Controllers\ProfileController;
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
})->middleware('auth', 'verified')->name('products.create');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(\App\Http\Controllers\ProductController::class)->group(function () {
    route::get('/products', 'index');
    route::get('/create-product', 'create');
    route::post('/create-product', 'store');
    route::get('/edit-product/{product_id}', 'edit');
    route::put('/update-product/{product_id}', 'update');
    route::delete('/delete-product/{product_id}', 'destroy');
});

require __DIR__.'/auth.php';
