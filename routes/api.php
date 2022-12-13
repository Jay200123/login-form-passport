<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;

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


//CUSTOMER REGISTER
Route::post('register', [RegisterController::class, 'register'])->name('user.register');

//EMPLOYEE REGISTER
Route::post('employee-register', [RegisterController::class, 'employeeRegister'])->name('employee.register');

//LOGIN FORM
Route::post('login', [RegisterController::class, 'login'])->name('user.login');

//Customer API
     
Route::get('/customers/all', [CustomerController::class, 'getCustomerAll'])->name('customer.all');

Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
//update
Route::post('/customers/{id}', [CustomerController::class, 'update'])->name('customer.update');

//delete
Route::delete('customers/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');


//EMPLOYEE API
Route::get('/employees/all', [EmployeeController::class, 'getEmployeeAll'])->name('employee.all');

//delete
Route::delete('employees/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

//edit
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
//update
Route::post('/employees/{id}', [EmployeeController::class, 'update'])->name('employee.update');

// Route::middleware('auth:api')->group( function () {
//     Route::resource('products', ProductController::class);
// });
