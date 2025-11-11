<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Customers_ReportController;
use App\Http\Controllers\InvoiceAttachmentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\InvoiceArchiveController;
use App\Http\Controllers\Invoices_ReportControlller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes (disable registration)
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('invoices', InvoicesController::class);
Route::resource('sections', SectionsController::class);
Route::resource('products', ProductsController::class);
Route::resource('InvoiceAttachments', InvoiceAttachmentsController::class);
Route::resource('Archive', InvoiceArchiveController::class);
Route::get('section/{id}', [InvoicesController::class, 'getproducts']);
Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class, 'index']);
Route::post('delete_file', [InvoicesDetailsController::class, 'destroy'])->name('delete_file');
Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'get_file']);

Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'open_file']);

Route::get('/edit_invoice/{id}', [InvoicesController::class, 'edit']);
Route::get('/Status_show/{id}', [InvoicesController::class, 'show'])->name('Status_show');
Route::post('/Status_Update/{id}', [InvoicesController::class, 'Status_Update'])->name('Status_Update');

Route::get('/Invoice_Paid', [InvoicesController::class, 'Invoice_Paid']);
Route::get('/Invoice_UnPaid', [InvoicesController::class, 'Invoice_UnPaid']);
Route::get('/Invoice_Partial', [InvoicesController::class, 'Invoice_Partial']);
Route::get('/Print_invoice/{id}', [InvoicesController::class, 'Print_invoice']);
Route::get('Invoice/export/', [InvoicesController::class, 'export']);

// Route::group(['middleware' => ['auth']], function() {

//     // ----- Roles -----
//     Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
//     Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create')->middleware('permission:role-create');
//     Route::post('roles', [RoleController::class, 'store'])->name('roles.store')->middleware('permission:role-create');
//     Route::get('roles/{id}', [RoleController::class, 'show'])->name('roles.show')->middleware('permission:role-list');
//     Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit')->middleware('permission:role-edit');
//     Route::put('roles/{id}', [RoleController::class, 'update'])->name('roles.update')->middleware('permission:role-edit');
//     Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware('permission:role-delete');

//     // ----- Users -----
//     Route::get('users', [UserController::class, 'index'])->name('users.index')->middleware('permission:user-list');
//     Route::get('users/create', [UserController::class, 'create'])->name('users.create')->middleware('permission:user-create');
//     Route::post('users', [UserController::class, 'store'])->name('users.store')->middleware('permission:user-create');
//     Route::get('users/{id}', [UserController::class, 'show'])->name('users.show')->middleware('permission:user-list');
//     Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('permission:user-edit');
//     Route::put('users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('permission:user-edit');
//     Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('permission:user-delete');
// });

Route::get('/Invoice_report', [Invoices_ReportControlller::class, 'index']);
Route::post('/Search_invoices', [Invoices_ReportControlller::class, 'Search_invoices']);

Route::get('/customers_report', [Customers_ReportController::class, 'index']);
Route::post('/Search_customers', [Customers_ReportController::class, 'Search_customers']);

// Catch-all admin route (moved to the bottom to avoid conflicts)
Route::get('/admin/{page}', [AdminController::class, 'index']);
