<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------


| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees',[EmployeeController::class,'index'])->name('employees.index');
Route::get('/employees/create',[EmployeeController::class,'create'])->name('employees.create');
Route::post('/employees',[EmployeeController::class,'store'])->name('employees.store');
Route::get('/employees/{employee}/edit',[EmployeeController::class,'edit'])->name('employees.edit');
Route::put('/employees/{employee}',[EmployeeController::class,'update'])->name('employees.update');
Route::delete('/employees/{employee}',[EmployeeController::class,'destroy'])->name('employees.destroy');
Route::get('/employees/login',[EmployeeController::class,'login'])->name('employees.login');
Route::post('/employees/login',[EmployeeController::class,'loginPost'])->name('employees.login');
Route::get('/employees/register',[EmployeeController::class,'register'])->name('employees.register');
Route::post('/employees/register',[EmployeeController::class,'registerPost'])->name('employees.register');
Route::get('/employees/list',[EmployeeController::class,'list'])->name('employees.list');
Route::get('/employees/data',[EmployeeController::class,'data'])->name('employees.data');

