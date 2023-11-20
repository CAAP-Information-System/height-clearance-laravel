<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ADMSController;
use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentReceiptController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// ADMIN MIDDLEWARE
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    // Dashboard route for admins
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboardView'])->name('dashboard');

    // Registered accounts route for admins
    Route::get('/registered-accounts', [App\Http\Controllers\AdminController::class, 'user_accountView'])->name('registered-accounts');

    // Application view route for admins
    Route::get('/application-view', [App\Http\Controllers\AdminController::class, 'showApplicationView'])->name('application-view');

    // Show application data route for admins
    Route::get('/show-application/{id}', [ApplicationFormController::class, 'showApplicationData'])->name('show-application');
});

// ADMS MIDDLEWARE
Route::prefix('adms')->middleware(['auth', 'isADMS'])->group(function () {
    // Queued applicants route for ADMS
    Route::get('/queue', [App\Http\Controllers\ADMSController::class, 'queuedApplicants'])->name('queue');

    // Document review route for ADMS
    Route::get('/doc-review/{id}', [App\Http\Controllers\ADMSController::class, 'documentReview'])->name('doc-review');

    // Update compliance route for ADMS
    Route::match(['get', 'post'], '/update-compliance/{id}', [ADMSController::class, 'updateCompliance'])->name('updateCompliance');

    // Critical evaluation route for ADMS
    Route::get('/critical-eval/{id}', [App\Http\Controllers\ADMSController::class, 'viewcriticalEvaluation'])->name('adms.critical_eval');

    // Update critical evaluation route for ADMS
    Route::post('/update-critic-eval/{id}', [App\Http\Controllers\ADMSController::class, 'updateCriticalEvaluation'])->name('updateCriticalEvaluation');

    // Height evaluation route for ADMS
    Route::get('/height-eval/{id}', [App\Http\Controllers\ADMSController::class, 'viewHeightEvaluation'])->name('adms.height_eval');

    // Update height evaluation route for ADMS
    Route::post('/update-height-eval/{id}', [App\Http\Controllers\ADMSController::class, 'updateHeightEvaluation'])->name('updateHeightEvaluation');

    // Supervisor evaluation route for ADMS


    // Update supervisor evaluation route for ADMS


    // Success page route for ADMS
    Route::get('/application-passed', [App\Http\Controllers\ADMSController::class, 'proceedToSupervisor'])->name('application-passed');
});

Route::prefix('supervisor')->middleware(['auth', 'isADMSSupervisor'])->group(function (){
    Route::get('/supervisor-eval/{id}', [App\Http\Controllers\ADMSController::class, 'ADMSSupervisorView'])->name('ADMSSupervisorView');
    Route::post('/update-supervisor-eval/{id}', [App\Http\Controllers\ADMSController::class, 'ADMSSupervisorUpdate'])->name('ADMSSupervisorUpdate');
});

// URL PROTECTION
Route::middleware(['checkPaymentCompleted'])->group(function () {
    // Routes protected by checking payment completion
});

Route::middleware(['payment.completed'])->group(function () {
    // Routes protected by payment completion middleware
});

Route::middleware(['is.loggedin'])->group(function () {
    // Default route to the login page for logged-in users
    Route::get('/', function () {
        return view('auth.login');
    });
});

// APPLICATION FORM
Route::get('/owner-form', [ApplicationFormController::class, 'apply_owner_view'])->name('owner-form');
Route::get('/application/{application_id}', [App\Http\Controllers\ApplicationFormController::class, 'application_form'])->name('upload');
Route::post('/submit-application', [ApplicationFormController::class, 'submitForm'])->name('submitApplication');
Route::post('/submit-owner-details', [ApplicationFormController::class, 'submit_owner_details'])->name('submitOwnerDetails');

// MESSAGES
Route::get('/please-go-back', [HomeController::class, 'finishedApplication'])->name('goBack');

Route::get('/payment-receipt/create/{application_id}', [PaymentReceiptController::class, 'create'])->name('components.payment_receipt.create');
Route::post('/payment-receipt/store/{application_id}', [PaymentReceiptController::class, 'store'])->name('components.payment_receipt.store');

Route::get('/application-status/{application_id}', [StatusController::class, 'applicationStatus'])->name('application-status');
Route::get('/view-status', [StatusController::class, 'showApplications'])->name('view-status');
Route::get('/check-results', [StatusController::class, 'checkResultsPage'])->name('check-results');
Route::get('/check-submission/{id}', [StatusController::class, 'checkSubmission'])->name('check-submission');

Route::get('/application-queue', [AdminController::class, 'applicationQueue'])->name('application-queue');

Route::get('/view-profile/{application_id}', [ProfileController::class, 'index'])->name('view-profile');
Route::get('/home', [HomeController::class, 'showHome'])->name('home');

Auth::routes();

Route::get('form-data/{id}', [ApplicationFormController::class, 'getFormData']);
Route::post('generate-pdf', [PDFController::class, 'generatePDF'])->name('generate-pdf');
