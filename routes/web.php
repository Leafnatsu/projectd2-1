<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController As Dashboard;
// use App\Http\Controllers\IndexController As Index;
// use App\Http\Controllers\MenuController As Menu;

require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('dashboard.user.index');
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



Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'admin'])->name('dashboard');
Route::get('/dashboard/user', [App\Http\Controllers\UserController::class, 'user'])->name('dashboard.user');
Route::get('/dashboard/products', [App\Http\Controllers\ProductsController::class, 'products'])->name('dashboard.products');
Route::get('/dashboard/products/from_add', [App\Http\Controllers\ProductsController::class, 'from_add'])->name('dashboard.products.from');
Route::post('/dashboard/products/add', [App\Http\Controllers\ProductsController::class, 'add'])->name('dashboard.products.add');
Route::get('/dashboard/products/edit/{id}', [App\Http\Controllers\ProductsController::class, 'edit'])->name('dashboard.products.edit');
Route::post('/dashboard/products/update/{id}', [App\Http\Controllers\ProductsController::class, 'update'])->name('dashboard.products.update');
Route::get('/dashboard/products/delete/{id}', [App\Http\Controllers\ProductsController::class, 'delete'])->name('dashboard.products.delete');


Route::get('/dashboard/category', [App\Http\Controllers\CategoryController::class, 'category'])->name('dashboard.category');
Route::get('/dashboard/category/from_add', [App\Http\Controllers\CategoryController::class, 'from_add'])->name('dashboard.category.from');
Route::post('/dashboard/category/add', [App\Http\Controllers\CategoryController::class, 'add'])->name('dashboard.category.add');
Route::get('/dashboard/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('dashboard.category.edit');
Route::post('/dashboard/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('dashboard.category.update');
Route::get('/dashboard/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('dashboard.category.delete');









// Route::middleware(['auth'])->name('dashboard.')->prefix('dashboard')->group(function(){

//     Route::get('/', [Dashboard::class, 'product'])->name('index');

//     Route::prefix('product')->group(function() {



//     });

//     // Route::get('product/add', [Dashboard::class, 'product_add'])->name('product.add');

//     Route::get('category', [Dashboard::class, 'category'])->name('category');

// });
