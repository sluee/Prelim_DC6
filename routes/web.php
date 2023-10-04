<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //   Route::resource('clients',[ClientController::class]);
    Route::middleware('can:manage-clients')->group(function(){
        Route::get('/clients/create', [ClientController::class, 'create'])->name('client.create');
        Route::get('/clients' ,[ClientController::class, 'index']);
        Route::post('/clients', [ClientController::class, 'store'])->name('client.store');
        Route::get('/clients/search/{searchKey}', [ClientController::class, 'search']);
        Route::get('/clients/edit/{client}', [ClientController::class, 'edit']);
        Route::put('/clients/{client}', [ClientController::class, 'update']);
        Route::get('/clients/{client}', [ClientController::class, 'show']);
    });



    // Route::get('/products/edit/{product}',[ProductController::class,'edit']);


    Route::middleware('can:manage-products')->group(function(){
        Route::get('/products' ,[ProductController::class, 'index']);
        Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/products', [ProductController::class, 'store'])->name('product.store');
        Route::get('/products/search/{searchKey}', [ProductController::class, 'search']);
        Route::get('/products/edit/{product}', [ProductController::class, 'edit']);
        Route::put('/products/{product}', [ProductController::class, 'update']);
        Route::get('/products/{product}', [ProductController::class, 'show']);
    });



    Route::middleware('can:manage-suppliers')->group(function(){
        Route::get('/suppliers' ,[SupplierController::class, 'index']);
        Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('supplier.create');
        Route::post('/suppliers', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('/suppliers/search/{searchKey}', [SupplierController::class, 'search']);
        Route::get('/suppliers/edit/{supplier}', [SupplierController::class, 'edit']);
        Route::put('/suppliers/{supplier}', [SupplierController::class, 'update']);
        Route::get('/suppliers/{supplier}', [SupplierController::class, 'show']);
    });


});


require __DIR__.'/auth.php';
