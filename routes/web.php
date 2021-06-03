<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    //Employee Route Hear--------------------------------------Start
    Route::resource('employe',EmployeeController::class);
    Route::get('/employe/{id}/delete',[EmployeeController::class,'delete'])->name('employe.delete');
    //Employee Route Hear--------------------------------------End

    //Customer Route Hear--------------------------------------Start
    Route::resource('customer',CustomerController::class);
    Route::get('/customer/{id}/delete',[CustomerController::class,'delete'])->name('customer.delete');
    //Customer Route Hear--------------------------------------End

    //suppliers Route Hear--------------------------------------Start
    Route::resource('suppliers',SuppliersController::class);
    Route::get('/suppliers/{id}/delete',[SuppliersController::class,'delete'])->name('suppliers.delete');
    //suppliers Route Hear--------------------------------------End

    //Salary Route Hear--------------------------------------Start
    Route::resource('salary',SalaryController::class);
    Route::get('/pay/salary',[SalaryController::class,'pay_salary'])->name('salary.pay');
    //Salary Route Hear--------------------------------------End
});

Route::get('/test',[EmployeeController::class,'test']);
Route::post('/test/post',[EmployeeController::class,'test_post'])->name('test.post');
