<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\MyAccountController;
use App\Http\Controllers\ProfileController;

//could have used built in laravel authentication mechanism
Route::get('/', [AuthController::class, 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post', [AuthController::class, 'register_post']);
Route::post('checkemail', [AuthController::class, 'checkemail']);
Route::post('login_post', [AuthController::class, 'login_post']);
Route::get('logout',[AuthController::class, 'logout']);

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('employees', EmployeesController::class, ['as' => 'admin']);

    Route::resource('departments', DepartmentController::class, ['as' => 'admin']);

    //todo - maybe we can remove these because it was not a requirement to have account pages for admin
    Route::get('account', [MyAccountController::class, 'edit'])->name('admin.account.edit');
    Route::put('account', [MyAccountController::class, 'update'])->name('admin.account.update');
});

Route::group(['middleware' => 'employee', 'prefix' => 'employee'], function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard']);
    Route::get('my_account', [MyAccountController::class, 'employee_my_account']);
    Route::post('my_account/update', [MyAccountController::class, 'employee_my_account_update']);
    Route::get('profile', [ProfileController::class, 'profile_data']);
    Route::post('profile/update', [ProfileController::class, 'data_update']);
});
