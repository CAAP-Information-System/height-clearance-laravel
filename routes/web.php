<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ADMSController;
use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentReceiptController;
use App\Http\Controllers\StatusController;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// ADMIN SECTION
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboardView'])->name('dashboard');
    Route::get('/registered-accounts', [App\Http\Controllers\AdminController::class, 'user_accountView'])->name('registered-accounts');
    Route::get('/application-view', [App\Http\Controllers\AdminController::class, 'showApplicationView'])->name('application-view');
    Route::get('/show-application/{id}', [ApplicationFormController::class, 'showApplicationData'])->name('show-application');

});

Route::prefix('adms')->middleware(['auth', 'isADMS'])->group(function(){
    Route::get('/critical-eval/{id}', [App\Http\Controllers\ADMSController::class, 'applicationEval'])->name('adms.critical_eval');
    Route::get('/doc-review/{id}', [App\Http\Controllers\ADMSController::class, 'documentReview'])->name('doc-review');
    Route::match(['get', 'post'], '/update-compliance/{id}', [ADMSController::class, 'updateCompliance'])->name('updateCompliance');


});

Route::get('/payment-receipt/create/{application_id}', [PaymentReceiptController::class, 'create'])->name('components.payment_receipt.create');
Route::post('/payment-receipt/store/{application_id}', [PaymentReceiptController::class, 'store'])->name('components.payment_receipt.store');

Route::get('/application-status/{application_id}', [StatusController::class, 'applicationStatus'])->name('application-status');
Route::get('/view-status', [StatusController::class, 'checkstatus'])->name('view-status');

Route::get('/application-queue', [AdminController::class, 'applicationQueue'])->name('application-queue');
Route::get('/fileUpload', [ApplicationFormController::class, 'testFileUpload'])->name('fileUpload');
Route::get('/home', [StatusController::class, 'showHome'])->name('home');
Route::get('/application', [App\Http\Controllers\ApplicationFormController::class, 'index'])->name('upload');
Route::get('/', function () {
    return view('auth.login');
});

Route::post('/submit-application', [ApplicationFormController::class, 'submitForm'])->name('submitApplication');
Auth::routes();

Route::get('form-data/{id}', [ApplicationFormController::class, 'getFormData']);


