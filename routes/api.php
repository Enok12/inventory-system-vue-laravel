<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\SalaryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\PosController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;











Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::apiResource('/employeee', EmployeeController::class);
Route::apiResource('/supplier', SupplierController::class);
Route::apiResource('/category', CategoryController::class);
Route::apiResource('/product', ProductController::class);
Route::apiResource('/expense', ExpenseController::class);
Route::apiResource('/customer', CustomerController::class);


Route::Post('/salary/paid/{id}', [SalaryController::class, 'Paid']);
Route::get('/salary', [SalaryController::class, 'AllSalary']);
Route::get('/salary/view/{id}', [SalaryController::class, 'ViewSalary']);
Route::get('/edit/salary/{id}', [SalaryController::class, 'EditSalary']);
Route::post('/salary/update/{id}', [SalaryController::class, 'UpdateSalary']);

Route::post('/stock/update/{id}', [ProductController::class, 'StockUpdate']);

Route::get('/getting/product/{id}', [PosController::class, 'GetProduct']);

//Add to Cart
Route::get('/addToCart/{id}', [CartController::class, 'AddtoCart']);
Route::get('/cart/product', [CartController::class, 'CartProduct']);
Route::get('/remove/cart/{id}', [CartController::class, 'removeCart']);
Route::get('/increment/{id}', [CartController::class, 'Increment']);
Route::get('/decrement/{id}', [CartController::class, 'Decrement']);

//VAT Route
Route::get('/vats', [CartController::class, 'Vats']);

Route::post('/orderdone', [PosController::class, 'orderdone']);

//Order Route
Route::get('/order', [OrderController::class, 'TodayOrder']);
Route::get('/order/details/{id}', [OrderController::class, 'OrderDetails']);
Route::get('/order/orderdetails/{id}', [OrderController::class, 'OrderDetailsAll']);
Route::post('/search/order/', [PosController::class, 'SearchOrderDate']);














