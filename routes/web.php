<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController As Dashboard;
// use App\Http\Controllers\IndexController As Index;
// use App\Http\Controllers\MenuController As Menu;

// FrontEnd

// BackEnd
Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function() {

    // Root of Dashboard
    Route::get('/', [Dashboard::class, 'Index'])->name('index');

    // Child Dashboard to Product
    Route::prefix('product')->name('product.')->group(function() {

        // First Page Admin
        Route::get('/', [Dashboard::class, 'Product'])->name('index');

        // Add Page
        Route::get('add', [Dashboard::class, 'ProductAdd'])->name('add');
        Route::post('add', [Dashboard::class, 'ProductInsert'])->name('insert');
        // Edit Page
        Route::get('edit', [Dashboard::class, 'ProductEdit'])->name('edit');
        Route::post('edit', [Dashboard::class, 'ProductUpdate'])->name('update');

    });

    // Route::get('product/add', [Dashboard::class, 'product_add'])->name('product.add');

    // Route::get('category', [Dashboard::class, 'category'])->name('category');

});

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




// Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('promote.index');
// Route::get('/menu', [App\Http\Controllers\MenuController::class, 'menu'])->name('promote.menu');
// Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('promote.cart');



// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'admin'])->name('dashboard');
// Route::get('/dashboard/user', [App\Http\Controllers\UserController::class, 'user'])->name('dashboard.user');
// Route::get('/dashboard/products', [App\Http\Controllers\ProductsController::class, 'products'])->name('dashboard.products');
// Route::get('/dashboard/products/from_add', [App\Http\Controllers\ProductsController::class, 'from_add'])->name('dashboard.products.from');
// Route::post('/dashboard/products/add', [App\Http\Controllers\ProductsController::class, 'add'])->name('dashboard.products.add');
// Route::get('/dashboard/products/edit/{id}', [App\Http\Controllers\ProductsController::class, 'edit'])->name('dashboard.products.edit');
// Route::post('/dashboard/products/update/{id}', [App\Http\Controllers\ProductsController::class, 'update'])->name('dashboard.products.update');
// Route::get('/dashboard/products/delete/{id}', [App\Http\Controllers\ProductsController::class, 'delete'])->name('dashboard.products.delete');


// Route::get('/dashboard/category', [App\Http\Controllers\CategoryController::class, 'category'])->name('dashboard.category');
// Route::get('/dashboard/category/from_add', [App\Http\Controllers\CategoryController::class, 'from_add'])->name('dashboard.category.from');
// Route::post('/dashboard/category/add', [App\Http\Controllers\CategoryController::class, 'add'])->name('dashboard.category.add');
// Route::get('/dashboard/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('dashboard.category.edit');
// Route::post('/dashboard/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('dashboard.category.update');
// Route::get('/dashboard/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('dashboard.category.delete');
