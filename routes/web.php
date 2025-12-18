<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Public routes (guest + user + admin)
|--------------------------------------------------------------------------
*/

// Home / Catalog
Route::get('/', [ProductController::class, 'index'])->name('home');

// Product details
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Public categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Filters UI
Route::view('/filters', 'filters.index')->name('filters.index');


/*
|--------------------------------------------------------------------------
| Auth routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| Admin Panel (admin-only)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/delivery-calculator/{product}', [\App\Http\Controllers\DeliveryController::class, 'index'])
        ->name('delivery.index');

});


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Admin Home
        Route::view('/', 'admin.dashboard')->name('dashboard');

        /*
         |------------------------------------------
         | PRODUCTS CRUD ( ручное, без resource )
         |------------------------------------------
         */

        Route::get('/products', [ProductController::class, 'adminIndex'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

        /*
         |------------------------------------------
         | CATEGORIES CRUD (можно оставить resource)
         |------------------------------------------
         */

        Route::resource('categories', CategoryController::class)->except(['show']);
    });


/*
|--------------------------------------------------------------------------
| User dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});
