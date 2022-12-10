<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::GET('register-form', [UserController::class, 'getRegister'])->name('customer.register');

// Sign up Forms
Route::GET('signup-forms', [UserController::class, 'getForm'])->name('user.form');


