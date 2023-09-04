<?php

use PgSql\Result;
use App\Http\Controllers\GenerateQr;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\IdController;
use App\Http\Controllers\TestControllerCrops;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\staff\StaffController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\ForgotPasswordController;
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
use App\Http\Controllers\staff\StaffSettingsController;
use App\Http\Controllers\staff\StaffFarmersDataController;
use App\Http\Controllers\staff\StaffManageUsersController;
use App\Http\Controllers\secretary\SecretaryFormController;
use App\Http\Controllers\staff\StaffSystemBackupController;
use App\Http\Controllers\secretary\SecretaryProfileController;
use App\Http\Controllers\secretary\SecretaryFarmDataController;
use App\Http\Controllers\Auth\AuthController as AuthAuthController;
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

Route::get('/login', [AuthAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthAuthController::class, 'login']);
Route::post('/logout', [AuthAuthController::class, 'logout'])->name('logout');
Route::get('forgot-password', [AuthAuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthAuthController::class, 'PostForgotPassword']);



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'admin']);
    Route::get('/get-farmer-count/{barangays_id}', [AdminController::class, 'getFarmerCount']);
    Route::get('/get-all-farmers-count', [AdminController::class, 'getAllFarmersCount']);
    Route::get('/get-status-count/{status}', [AdminController::class, 'getStatusCount']);

    Route::get('admin/farmreport', [FarmersDataController::class, 'farmdata']);
    Route::get('admin/reports', [ReportsController::class, 'reports']);
    Route::get('admin/audit', [SettingsController::class, 'audit']);
    Route::get('admin/backup', [SettingsController::class, 'backup']);
    Route::get('admin/generate', [FarmersDataController::class, 'generate']);
    Route::get('/get-municipalities/{provinces_id}', [FarmersDataController::class, 'getMunicipalities']);
    Route::get('/get-barangays/{municipalities_id}', [FarmersDataController::class, 'getBarangays']);

    Route::get('admin/create-add', [FarmersDataController::class, 'create']);
    Route::post('admin/create', [FarmersDataController::class, 'store']);
    Route::get('farmers-view/{id}/view', [FarmersDataController::class, 'show'])->name('farmers.show');
    Route::get('farmers-edit/{id}/edit', [FarmersDataController::class, 'edit'])->name('farmers.edit');
    Route::put('farmers-update/{id}', [FarmersDataController::class, 'update']);
    Route::get('farmers-generate/{id}/generate', [FarmersDataController::class, 'generate'])->name('farmers.generate');

    Route::get('qr', [GenerateQr::class, 'qrGen']);
    // Admin Manage users
    Route::get('admin/users-add', [UserController::class, 'create']);
    Route::post('admin/users', [UserController::class, 'store']);
    Route::get('admin/manageusers', [ManageUsersController::class, 'manage']);
    Route::get('user-view/{id}', [ManageUsersController::class, 'show']);
    Route::get('user-edit/{id}', [ManageUsersController::class, 'edit']);
    Route::put('user-update/{id}', [ManageUsersController::class, 'update']);


    Route::get('admin/profile', [SettingsController::class, 'profile']);
    Route::put('admin/profile-update/{id}', [SettingsController::class, 'updateProfile'])->name('admin.profile.update');
    Route::put('admin/password-update/{id}', [SettingsController::class, 'updatePassword'])->name('admin.password.update');
});



// // Route group with the StaffMiddleware applied to all routes within
// Route::middleware(['auth', 'staff'])->group(function () {
//     // Staff Routes
//     Route::get('staff/dashboard', [StaffController::class, 'staff']);
//     Route::get('/get-farmer-count/{barangays_id}', [StaffController::class, 'FarmerCount']);
//     Route::get('/get-all-farmers-count', [StaffController::class, 'AllFarmersCount']);
//     Route::get('/get-status-count/{status}', [StaffController::class, 'StatusCount']);



//     Route::get('staff/farmreport', [StaffFarmersDataController::class, 'farmdata']);
//     Route::get('staff/reports', [StaffReportsController::class, 'reports']);
//     Route::get('staff/audit', [StaffSettingsController::class, 'audit']);
//     Route::get('staff/backup', [StaffSettingsController::class, 'backup']);
//     Route::get('staff/generate', [StaffFarmersDataController::class, 'generate']);
//     Route::get('/get-municipalities/{provinces_id}', [StaffFarmersDataController::class, 'Municipalities']);
//     Route::get('/get-barangays/{municipalities_id}', [StaffFarmersDataController::class, 'Barangays']);

//     Route::get('staff/create-add', [StaffFarmersDataController::class, 'create']);
//     Route::post('staff/create', [StaffFarmersDataController::class, 'store']);
//     Route::get('farmers-view/{id}/view', [StaffFarmersDataController::class, 'show'])->name('farmers.view');
//     Route::get('farmers-edit/{id}/edit', [StaffFarmersDataController::class, 'edit'])->name('farmers.update');
//     Route::put('farmers-update/{id}', [StaffFarmersDataController::class, 'update']);
//     Route::get('farmers-generate/{id}/generate', [StaffFarmersDataController::class, 'generate'])->name('farmers.gen');

//     Route::get('qr', [GenerateQr::class, 'qrGen']);
//     // staff Manage users
//     Route::get('staff/users-add', [StaffUserController::class, 'create']);
//     Route::post('staff/users', [StaffUserController::class, 'store']);
//     Route::get('staff/manageusers', [StaffManageUsersController::class, 'manage']);
//     Route::get('user-view/{id}', [StaffManageUsersController::class, 'show']);
//     Route::get('user-edit/{id}', [StaffManageUsersController::class, 'edit']);
//     Route::put('user-update/{id}', [StaffManageUsersController::class, 'update']);


//     Route::get('staff/profile', [StaffSettingsController::class, 'profile']);
//     Route::put('staff/profile-update/{id}', [StaffSettingsController::class, 'updateProfile'])->name('staff.profile.edit');
//     Route::put('staff/password-update/{id}', [StaffSettingsController::class, 'updatePassword'])->name('staff.password.edit');
// });



//test
Route::get('/test', [TestController::class, 'qrGen']);




Route::get('qr-code/{id}', [QRCodeController::class, 'showProfile'])->name('qr-code.show');

// Password Notification
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email',  [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


//Password Reset
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');
