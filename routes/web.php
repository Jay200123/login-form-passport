<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;

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
    return view('welcome');
});

// for Customer Registration Form
Route::GET('register-form', [UserController::class, 'getRegister'])->name('customer.form');

//for Employee Registration Form
Route::GET('employee-register', [UserController::class, 'getEmployee'])->name('employee.form');

//customer index
Route::GET('customer', [CustomerController::class, 'index'])->name('customer.index');

//employee index
Route::GET('employee', [EmployeeController::class, 'index'])->name('employee.index');

//product index
Route::GET('product', [ProductController::class, 'index'])->name('product.index');

//service index
Route::get('service', [ServiceController::class, 'index'])->name('service.index');

// Sign up Forms
Route::GET('signup-forms', [UserController::class, 'getForm'])->name('user.form');

//route for message in registration
Route::GET('confirmation-message', [UserController::class, 'getMessage'])->name('confirm.message');





