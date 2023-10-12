<?php

use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\HomeController;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// ADMIN SECTION
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboardView'])->name('dashboard');
    Route::get('/registered-accounts', [App\Http\Controllers\AdminController::class, 'user_accountView'])->name('registered-accounts');
    Route::get('/application-view', [App\Http\Controllers\AdminController::class, 'showApplicationView'])->name('application-view');
});



Route::get('/home', [HomeController::class, 'showHome'])->name('home');
Route::get('/application', [App\Http\Controllers\ApplicationFormController::class, 'index'])->name('upload');
Route::get('/', function () {
    return view('auth.login');
});

Route::post('/submit-application', [ApplicationFormController::class, 'submitForm'])->name('submitApplication');
Auth::routes();

Route::get('form-data/{id}', [ApplicationFormController::class, 'getFormData']);


