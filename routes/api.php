<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\SupplierProductsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/orders',   [OrdersController::class, 'index']);
Route::prefix('/orders')->group( function() {
    Route::get('/orders',   [OrdersController::class, 'index']);
    Route::get('/order{id}',   [OrdersController::class, 'getOrder']);
    Route::post('/create',  [OrdersController::class, 'createOrder']);
    Route::put('/order{id}',    [OrdersController::class, 'updateOrder']);
    Route::delete('/order{id}', [OrdersController::class, 'deleteOrder']);
});



Route::get('/order_details', [OrderDetailsController::class, 'index']);
Route::prefix('/V1')->group( function() {
    Route::get('/details', [OrderDetailsController::class, 'index']);
    Route::get('/details{id}',  [OrderDetailsController::class, 'getOrderDetails']);
    Route::put('/{id}',    [OrdersDetailsController::class, 'update']);
    Route::delete('/{id}', [OrdersDeatilsController::class, 'delete']);
});

Route::get('/product', [ProductsController::class, 'index']);
Route::prefix('/V2')->group( function() {
    Route::get('/products', [ProductsController::class, 'index']);
    Route::get('/product{id}',   [ProductsController::class, 'getProducts']);
    Route::post('/create',  [productsController::class, 'createProduct']);
    Route::put('/product{id}',    [productsController::class, 'updateProduct']);
    Route::delete('/product{id}', [productsController::class, 'deleteProduct']);
});


Route::get('/suppliers', [SuppliersController::class, 'index']);
Route::prefix('/V3')->group( function() {
    Route::get('/suppliers', [SuppliersController::class, 'index']);
    Route::get('/supplier{id}', [SuppliersController::class, 'getSupplier']);
    Route::post('/create',  [SuppliersController::class, 'createSupplier']);
    Route::put('/supplier{id}',    [SuppliersController::class, 'updateSupplier']);
    Route::delete('/supplier{id}', [SuppliersController::class, 'deleteSupplier']);
});

Route::get('/supplierproducts', [SupplierProductsController::class, 'index']);
Route::prefix('/V4')->group( function() {
    Route::get('/supplierproducts', [SupplierProductsController::class, 'index']);
    Route::get('/supplierproduct{id}', [SupplierProductsController::class, 'getSupplierProducts']);
    Route::post('/create',  [SupplierProductsController::class, 'createSupplierProducts']);
    Route::put('/supplierproduct{id}',    [SupplierProductsController::class, 'updateSupplierProducts']);
    Route::delete('/supplierproduct{id}', [SupplierProductsController::class, 'deleteSupplierProducts']);
});

Route::get('/users', [UserController::class, 'index']);

Route::middleware('auth:api')->get('/user/:id', function (Request $request) {
    return $request->user();
});