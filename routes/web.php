<?php

use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\HomeController;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// ADMIN SECTION
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');

});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/application', [App\Http\Controllers\ApplicationFormController::class, 'index'])->name('upload');
Route::get('/', function () {
    return view('auth.login');
});

Route::post('/submit-application', [ApplicationFormController::class, 'submitForm'])->name('submitApplication');
Auth::routes();

Route::get('form-data/{id}', [ApplicationFormController::class, 'getFormData']);


