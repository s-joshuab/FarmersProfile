<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IdController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\staff\StaffController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\staff\StaffFormController;
use App\Http\Controllers\staff\StaffUserController;
use App\Http\Controllers\Admin\AuditTrailController;
use App\Http\Controllers\staff\StaffAuditController;
use App\Http\Controllers\Admin\FarmersDataController;
use App\Http\Controllers\Admin\ManageUsersController;
use App\Http\Controllers\Admin\SystemBackupController;
use App\Http\Controllers\staff\StaffProfileController;
use App\Http\Controllers\staff\StaffReportsController;
use App\Http\Controllers\secretary\SecretaryController;
use App\Http\Controllers\staff\StaffFarmersDataController;
use App\Http\Controllers\staff\StaffManageUsersController;
use App\Http\Controllers\secretary\SecretaryFormController;
use App\Http\Controllers\staff\StaffSystemBackupController;
use App\Http\Controllers\secretary\SecretaryProfileController;
use App\Http\Controllers\secretary\SecretaryFarmDataController;
use App\Http\Controllers\TestController;

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




//Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'admin']);
    Route::get('admin/farmreport', [FarmersDataController::class, 'farmdata']);
    Route::get('admin/reports', [ReportsController::class, 'reports']);
    Route::get('admin/profile', [SettingsController::class, 'profile']);
    Route::get('admin/audit', [SettingsController::class, 'audit']);
    Route::get('admin/backup', [SettingsController::class, 'backup']);
    Route::get('admin/id', [FarmersDataController::class, 'ID']);
    Route::get('/get-municipalities/{provinces_id}', [FarmersDataController::class, 'getMunicipalities']);
    Route::get('/get-barangays/{municipalities_id}', [FarmersDataController::class, 'getBarangays']);

    Route::get('admin/create-add', [FarmersDataController::class, 'create']);
    Route::post('admin/create', [FarmersDataController::class, 'store']);

    // Admin Manage users
    Route::get('admin/users-add', [UserController::class, 'create']);
    Route::post('admin/users', [UserController::class, 'store']);
    Route::get('admin/manageusers', [ManageUsersController::class, 'manage']);
    Route::get('user-view/{id}', [ManageUsersController::class, 'show']);
    Route::get('user-edit/{id}', [ManageUsersController::class, 'edit']);
    Route::put('user-update/{id}', [ManageUsersController::class, 'update']);
//});

// Route group with the StaffMiddleware applied to all routes within
Route::middleware(['auth', 'staff'])->group(function () {
    // Staff Routes
    Route::get('staff/dashboard', [StaffController::class, 'staff']);
    Route::get('staff/farmreport', [StaffFarmersDataController::class, 'farmdata']);
    Route::get('staff/reports', [StaffReportsController::class, 'reports']);
    Route::get('staff/profile', [StaffProfileController::class, 'profile']);
    Route::get('staff/audit', [StaffAuditController::class, 'audit']);
    Route::get('staff/backup', [StaffSystemBackupController::class, 'backup']);
    Route::get('staff/form', [StaffFormController::class, 'form']);

    // Staff Manage Users
    Route::get('staff/users-add', [StaffUserController::class, 'create']);
    Route::post('staff/users', [StaffUserController::class, 'store']);
    Route::get('staff/manageusers', [StaffManageUsersController::class, 'manage']);
    Route::get('staff-view/{id}', [StaffManageUsersController::class, 'show']);
    Route::get('staff-edit/{id}', [StaffManageUsersController::class, 'edit']);
    Route::put('staff-update/{id}', [StaffManageUsersController::class, 'update']);
});


// Route group with the SecretaryMiddleware applied to all routes within
Route::middleware(['auth', 'secretary'])->group(function () {
    Route::get('secretary/dashboard', [SecretaryController::class, 'secretary']);
    Route::get('secretary/form', [SecretaryFormController::class, 'form']);
    Route::get('secretary/profile', [SecretaryProfileController::class, 'profile']);
});



//test
Route::get('test', [TestController::class, 'index']);
Route::get('/get-municipalities/{provinces_id}', [TestController::class, 'getMunicipalities']);

Route::get('/get-barangays/{municipalities_id}', [TestController::class, 'getBarangays']);

Route::post('/save-data', [TestController::class, 'saveData']);


