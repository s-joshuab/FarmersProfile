<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\AuditTrailController;
use App\Http\Controllers\Admin\FarmersDataController;
use App\Http\Controllers\Admin\ManageUsersController;
use App\Http\Controllers\Admin\SystemBackupController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Admin Routes
Route::get('admin/dashboard', [AdminController::class, 'admin']);
Route::get('admin/farmreport', [FarmersDataController::class, 'farmdata']);
Route::get('admin/reports', [ReportsController::class, 'reports']);
Route::get('admin/manageusers', [ManageUsersController::class, 'manage']);
Route::get('admin/profile', [ProfileController::class, 'profile']);
Route::get('admin/audit', [AuditTrailController::class, 'audit']);
Route::get('admin/backup', [SystemBackupController::class, 'backup']);
Route::get('admin/form', [FormController::class, 'form']);
Route::get('admin/users', [UserController::class, 'users']);

Route::post('admin/user/add', [UserController::class, 'store']);

