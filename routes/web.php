<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController As Dashboard;
// use App\Http\Controllers\IndexController As Index;
// use App\Http\Controllers\MenuController As Menu;

require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('dashboard.index');
// });

// Route::name('promote.')->prefix('index')->group(function(){

//         Route::get('/',[Index::class, 'index'])->name('index');

//         Route::prefix('index')->group(function() {


//             });
//         Route::get('/', [Menu::class, 'menu'])->name('menu');

//         Route::prefix('menu')->group(function() {


//         });
//         });




Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('promote.index');
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'menu'])->name('promote.menu');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('promote.cart');










Route::middleware(['auth'])->name('dashboard.')->prefix('dashboard')->group(function(){

    Route::get('/', [Dashboard::class, 'product'])->name('index');

    Route::prefix('product')->group(function() {



    });

    // Route::get('product/add', [Dashboard::class, 'product_add'])->name('product.add');

    Route::get('category', [Dashboard::class, 'category'])->name('category');

});
