<?php

use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
// Chart
Route::get('/menus/{id}', [FrontendMenuController::class, 'show'])->name('menus.show');
Route::get('/cart/{id}', [CartController::class, 'index'])->name('cart');
Route::post('/carts/add', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::post('/carts/update', [CartController::class, 'updateCart']);
Route::post('/carts/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('orders', [OrderController::class, 'index']);
Route::get('/invoice/{id}', [OrderController::class, 'invoice']);





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::middleware(['check.role', 'auth', 'admin'])->group(function () {
//     Route::prefix('{username}/admin')->name('admin.')->group(function () {
//         Route::get('/', [AdminController::class, 'index'])->name('index');
//         Route::resource('/categories', CategoryController::class);
//         Route::resource('/menus', MenuController::class);
//         Route::resource('/tables', TableController::class);
//         Route::resource('/reservations', ReservationController::class);
//     });
// });
Route::get('/pesanan', [PesananController::class, 'index']);
Route::post('/pesanan/dataAntrian', [PesananController::class, 'dataAntrian']);
Route::post('/pesanan/dataAntrianSelesai', [PesananController::class, 'dataAntrianSelesai']);
Route::post('/pesanan/proses', [PesananController::class, 'proses']);
Route::post('/pesanan/rincianPesanan', [PesananController::class, 'rincianPesanan']);
Route::middleware(['auth', 'check.role:1'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    
});

// Route::middleware(['auth:kedai', 'kedai.admin'])->name('admin.')->prefix('admin')->group(function () {
//     Route::get('/', [AdminController::class, 'index'])->name('index');
//     Route::resource('/categories', CategoryController::class);
//     Route::resource('/menus', MenuController::class);
//     Route::resource('/tables', TableController::class);
//     Route::resource('/reservations', ReservationController::class);
// });

// Bagian User

// Route::get('/profile', [UserController::class, 'userProfile']);
// Route::get('/setting', [UserController::class, 'userSetting']);
// Route::post('/update', [UserController::class, 'userUpdate']);






// transaction
Route::controller(TransactionController::class)->group(function () {
    Route::get("/transaction", "index");
    Route::get("/transaction/add_outcome", "addOutcomeGet")->can("is_admin");
    Route::post("/transaction/add_outcome", "addOutcomePost")->can("is_admin");
    Route::get("/transaction/edit_outcome/{transaction}", "editOutcomeGet")->can("is_admin");
    Route::post("/transaction/edit_outcome/{transaction}", "editOutcomePost")->can("is_admin");
});

require __DIR__ . '/auth.php';
