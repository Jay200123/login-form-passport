<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\CustomerController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'register'])->name('user.register');
Route::post('login', [RegisterController::class, 'login'])->name('user.login');
     
Route::get('/customers/all', [CustomerController::class, 'getCustomerAll'])->name('customer.all');
// Route::middleware('auth:api')->group( function () {
//     Route::resource('products', ProductController::class);
// });