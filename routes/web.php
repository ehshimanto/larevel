<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\Expensecaregorycontroller;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\Incomecaregorycontroller;
use App\Http\Controllers\RecycleController;
use App\Http\Controllers\ReportController;

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


// Admin panel Route
Route::get('/dashboard', [AdminController::class, 'index']);


Route::get('/dashboard/user', [UserController::class, 'all']);
Route::get('/dashboard/user/add', [UserController::class, 'add']);
Route::get('/dashboard/user/edit', [UserController::class, 'edit']);
Route::get('/dashboard/user/view', [UserController::class, 'view']);
Route::post('/dashboard/user/submit', [UserController::class, 'submit']);
Route::post('/dashboard/user/insert', [UserController::class, 'insert']);
Route::post('/dashboard/user/update', [UserController::class, 'update']);
Route::post('/dashboard/user/softdelete', [UserController::class, 'softdelete']);
Route::post('/dashboard/user/restore', [UserController::class, 'restore']);
Route::post('/dashboard/user/delete', [UserController::class, 'delete']);

Route::get('/dashboard/Income', [IncomeController::class, 'index']);
Route::get('/dashboard/Income/add', [IncomeController::class, 'add']);
Route::get('/dashboard/Income/edit', [IncomeController::class, 'edit']);
Route::get('/dashboard/Income/view', [IncomeController::class, 'view']);
Route::post('/dashboard/Income/submit', [IncomeController::class, 'submit']);
Route::post('/dashboard/Income/insert', [IncomeController::class, 'insert']);
Route::post('/dashboard/Income/update', [IncomeController::class, 'update']);
Route::post('/dashboard/Income/softdelete', [IncomeController::class, 'softdelete']);
Route::post('/dashboard/Income/restore', [IncomeController::class, 'restore']);
Route::post('/dashboard/Income/delete', [IncomeController::class, 'delete']);

Route::get('/dashboard/Income/caregory', [Incomecaregorycontroller::class, 'index']);
Route::get('/dashboard/Income/caregory/add', [Incomecaregorycontroller::class, 'add']);
Route::get('/dashboard/Income/caregory/edit/{slug}', [Incomecaregorycontroller::class, 'edit']);
Route::get('/dashboard/Income/caregory/view/{slug}', [Incomecaregorycontroller::class, 'view']);
Route::post('/dashboard/Income/caregory/submit', [Incomecaregorycontroller::class, 'submit']);
Route::post('/dashboard/Income/caregory/insert', [Incomecaregorycontroller::class, 'insert']);
Route::post('/dashboard/Income/caregory/update', [Incomecaregorycontroller::class, 'update']);
Route::post('/dashboard/Income/caregory/softdelete', [Incomecaregorycontroller::class, 'softdelete']);
Route::post('/dashboard/Income/caregory/restore', [Incomecaregorycontroller::class, 'restore']);
Route::post('/dashboard/Income/caregory/delete', [Incomecaregorycontroller::class, 'delete']);

Route::get('/dashboard/Expense', [ExpenseController::class, 'index']);
Route::get('/dashboard/Expense/add', [ExpenseController::class, 'add']);
Route::get('/dashboard/Expense/edit', [ExpenseController::class, 'edit']);
Route::get('/dashboard/Expense/view', [ExpenseController::class, 'view']);
Route::post('/dashboard/Expense/submit', [ExpenseController::class, 'submit']);
Route::post('/dashboard/Expense/insert', [ExpenseController::class, 'insert']);
Route::post('/dashboard/Expense/update', [ExpenseController::class, 'update']);
Route::post('/dashboard/Expense/softdelete', [ExpenseController::class, 'softdelete']);
Route::post('/dashboard/Expense/restore', [ExpenseController::class, 'restore']);
Route::post('/dashboard/Expense/delete', [ExpenseController::class, 'delete']);

Route::get('/dashboard/Expense/caregory', [Expensecaregorycontroller::class, 'index']);
Route::get('/dashboard/Expense/caregory/add', [Expensecaregorycontroller::class, 'add']);
Route::get('/dashboard/Expense/caregory/edit', [Expensecaregorycontroller::class, 'edit']);
Route::get('/dashboard/Expense/caregory/view', [Expensecaregorycontroller::class, 'view']);
Route::post('/dashboard/Expense/caregory/submit', [Expensecaregorycontroller::class, 'submit']);
Route::post('/dashboard/Expense/caregory/insert', [Expensecaregorycontroller::class, 'insert']);
Route::post('/dashboard/Expense/caregory/update', [Expensecaregorycontroller::class, 'update']);
Route::post('/dashboard/Expense/caregory/softdelete', [Expensecaregorycontroller::class, 'softdelete']);
Route::post('/dashboard/Expense/caregory/restore', [Expensecaregorycontroller::class, 'restore']);
Route::post('/dashboard/Expense/caregory/delete', [Expensecaregorycontroller::class, 'delete']);

Route::get('/dashboard/report', [ReportController::class, 'index']);

Route::get('/dashboard/recycle', [RecycleController::class, 'index']);
Route::get('/dashboard/recycle/user', [RecycleController::class, 'user']);
Route::get('/dashboard/recycle/income', [RecycleController::class, 'income']);
Route::get('/dashboard/recycle/income/category', [RecycleController::class, 'income_category']);


require __DIR__.'/auth.php';
