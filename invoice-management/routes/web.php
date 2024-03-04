<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManagementController;

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








Route::get('login', [UserController::class, 'index'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('custom-login', [UserController::class, 'customLogin'])->name('login.custom');

Route::middleware(['auth'])->group(function () {

Route::get('/add-user', function () {
    return view('user.add-user');
});

Route::get('add-customer', [CustomerController::class, 'index'])->name('add.customer');
Route::get('setting', [UserController::class, 'setting'])->name('setting');

Route::get('/', [UserController::class, 'index']);
Route::post('add-user', [UserController::class, 'addUser'])->name('add.user');
Route::get('manage-user', [UserController::class, 'manageUser'])->name('manage.user');
Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [UserController::class, 'logout']);
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/{id}', [UserController::class, 'update'])->name('users.update');
Route::post('/profile', [UserController::class, 'update_profile'])->name('update.profile');

Route::post('add-customer', [CustomerController::class, 'addCustomer'])->name('add.customer');
Route::get('manage-customer', [CustomerController::class, 'manageCustomer'])->name('manage.customer');
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::post('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::post('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');

Route::get('add-project', [ProjectController::class, 'index']);
Route::get('manage-project', [ProjectController::class, 'manageProject'])->name('manage.project');
Route::post('add-project', [ProjectController::class, 'addProject'])->name('add.project');
Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::post('/project/{id}', [ProjectController::class, 'update'])->name('project.update');


Route::get('create-invoice', [InvoiceController::class, 'index']);
Route::get('manage-invoice', [InvoiceController::class, 'manage_invoice'])->name('manage.invoice');

Route::get('/fetch-more-data',[InvoiceController::class, 'fetchMoreData'])->name('fetch.more.data');


Route::post('/invoice', [InvoiceController::class, 'store'])->name('store.invoice');
Route::get('/report/{id}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
Route::post('/report/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
Route::get('/report/status', [InvoiceController::class, 'statusUpdate'])->name('report.status');

Route::get('/report/{id}/view', [InvoiceController::class, 'view'])->name('invoice.view');
Route::get('/report/{id}/mail', [InvoiceController::class, 'send_mail'])->name('invoice.mail');

Route::post('/department/{id}', [ManagementController::class, 'update_department'])->name('department.update');


Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.show');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');

Route::get('manage-department', [ManagementController::class, 'manage_department'])->name('manage.department');
Route::get('add-department', [ManagementController::class, 'add_department'])->name('add.department');
Route::get('/department/{id}/edit', [ManagementController::class, 'department_edit']);



Route::post('add-department', [ManagementController::class, 'add_department'])->name('add.department');
Route::get('manage-currency', [ManagementController::class, 'manage_currency'])->name('manage.currency');
Route::post('manage-currency', [ManagementController::class, 'store_currency'])->name('manage.currency');
Route::get('manage-country', [ManagementController::class, 'manage_country'])->name('manage.country');
Route::post('manage-country', [ManagementController::class, 'store_country'])->name('manage.country');
Route::get('/country/{id}/edit', [ManagementController::class, 'country_edit'])->name('edit.country');
Route::get('/currency/{id}/edit', [ManagementController::class, 'currency_edit'])->name('edit.currency');

Route::post('edit-currency/{id}', [ManagementController::class, 'update_currency'])->name('edit.currency');
Route::post('edit-country/{id}', [ManagementController::class, 'update_country'])->name('update.country');


});
