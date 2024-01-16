<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\QrDataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

Route::get('/',[LoginController::class,'index'])->name('login');
Route::get('/reboot', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    echo "<h3>config, cache, route, view - clear</h3>";
});
Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    echo "<h3>config clear</h3>";
});



Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'authenticate'])->name('login.authenticate');

Route::group(['middleware' => ['auth', 'web']], function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('home',[HomeController::class,'index'])->name('dashboard');
    Route::get('print/{id}',[HomeController::class,'printable'])->name('printable');
    Route::Resource('admin',AdminController::class);
    Route::Resource('department',DepartmentController::class);
    Route::Resource('staff',StaffController::class);
    Route::Resource('qr',QrDataController::class);
    Route::post('qr/token-view',[QrDataController::class,'token_view'])->name('qr.token_view');
    Route::Resource('profile',ProfileController::class);
    Route::post('profile/change-password',[ProfileController::class,'change_password'])->name('profile.change_password');
});


