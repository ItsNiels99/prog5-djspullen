<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/products', function () {
    return view('product');
});
Route::get('/', function () {
    return view('welcome');
});


// routes die later weg gehaald wordt als er beter begrepen is wat deze doet
   Route::get('/dashboard', function () {
   return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// product controllers
Route::get('products', [ProductController::class, 'index']);
Route::get('products/create', [ProductController::class, 'create']);
Route::post('products', [ProductController::class, 'store']);
Route::get('products/{id}/edit', [ProductController::class, 'edit']);
Route::put('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'destroy']);


require __DIR__.'/auth.php';
