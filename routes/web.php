<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/company', [CompanyController::class, 'index'])->name('company');
Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
Route::get('/company/edit/{company}', [CompanyController::class, 'edit'])->name('company.edit');
Route::put('/company/{company}', [CompanyController::class, 'update'])->name('company.update');

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');



