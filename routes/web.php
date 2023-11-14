<?php

use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;


Route::get('/', [WelcomeController::class, 'index']);
Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
Route::get('/reservation/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservation/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/reservations', ReservationController::class);
});
// transaction
Route::controller(TransactionController::class)->group(function () {
    Route::get("/transaction", "index");
    Route::get("/transaction/add_outcome", "addOutcomeGet")->can("is_admin");
    Route::post("/transaction/add_outcome", "addOutcomePost")->can("is_admin");
    Route::get("/transaction/edit_outcome/{transaction}", "editOutcomeGet")->can("is_admin");
    Route::post("/transaction/edit_outcome/{transaction}", "editOutcomePost")->can("is_admin");
});
// Order
Route::controller(OrderController::class)->group(function () {
    Route::get("/order/order_data", "orderData");
    Route::get("/order/order_history", "orderHistory");
    Route::get("/order/order_data/{status_id}", "orderDataFilter");
    Route::get("/order/data/{order}", "getOrderData")->can("my_real_order", "order");
    Route::get("/order/getProof/{order}", "getProofOrder")->can("my_real_order", "order");


    // customer only
    Route::get("/order/make_order/{product:id}", "makeOrderGet")->can("create_order", App\Models\Order::class);
    Route::post("/order/make_order/{product:id}", "makeOrderPost")->can("create_order", App\Models\Order::class);
    Route::get("/order/edit_order/{order}", "editOrderGet")->can("edit_order", "order");
    Route::post("/order/edit_order/{order}", "editOrderPost")->can("edit_order", "order");
    Route::get("/order/delete_proof/{order}", "deleteProof")->can("delete_proof", "order");
    Route::post("/order/cancel_order/{order}", "cancelOrder")->can("cancel_order", "order");
    Route::post("/order/upload_proof/{order}", "uploadProof")->can("upload_proof", "order");

    // admin only
    Route::post("/order/reject_order/{order}/{product}", "rejectOrder")->can("reject_order", App\Models\Order::class);
    Route::post("/order/end_order/{order}/{product}", "endOrder")->can("end_order", App\Models\Order::class);
    Route::post("/order/approve_order/{order}/{product}", "approveOrder")->can("approve_order", App\Models\Order::class);
});
require __DIR__ . '/auth.php';
