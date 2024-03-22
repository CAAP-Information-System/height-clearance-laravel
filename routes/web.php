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

Auth::routes();
Route::middleware(['is.loggedin'])->group(function () {
    // Default route to the login page for logged-in users
    Route::get('/', function () {
        return view('auth.login');
    });
});

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
Route::prefix('adms-evaluator')->middleware(['auth', 'isADMSEvaluator'])->group(function () {
    Route::get('/queue', [App\Http\Controllers\ADMSController::class, 'queuedApplicants'])->name('queue');
    Route::get('/doc-review/{application_id}', [App\Http\Controllers\ADMSController::class, 'documentReview'])->name('doc-review');
    Route::match(['get', 'post'], '/update-compliance/{application_id}', [ADMSController::class, 'updateCompliance'])->name('updateCompliance');
    Route::get('/critical-eval/{application_id}', [App\Http\Controllers\ADMSController::class, 'viewcriticalEvaluation'])->name('adms.critical_eval');
    Route::post('/update-critic-eval/{application_id}', [App\Http\Controllers\ADMSController::class, 'updateCriticalEvaluation'])->name('updateCriticalEvaluation');
    Route::get('/height-eval/{application_id}', [App\Http\Controllers\ADMSController::class, 'viewHeightEvaluation'])->name('adms.height_eval');
    Route::post('/update-height-eval/{application_id}', [App\Http\Controllers\ADMSController::class, 'updateHeightEvaluation'])->name('updateHeightEvaluation');
    Route::get('/application-passed', [App\Http\Controllers\ADMSController::class, 'proceedToSupervisor'])->name('application-passed');
});

Route::prefix('adms-supervisor')->middleware(['auth', 'isADMSSupervisor'])->group(function (){
    Route::get('/home', [App\Http\Controllers\ADMSController::class, 'ADMSSupervisorHome'])->name('supervisor-home');
    Route::get('/evaluation/{id}', [App\Http\Controllers\ADMSController::class, 'ADMSSupervisorView'])->name('ADMSSupervisorView');
    Route::post('/update-supervisor-eval/{id}', [App\Http\Controllers\ADMSController::class, 'ADMSSupervisorUpdate'])->name('ADMSSupervisorUpdate');
    Route::get('/proceed-to-chief', [App\Http\Controllers\ADMSController::class, 'proceedToChief'])->name('ADMStoChief');

});

Route::prefix('adms-chief')->middleware(['auth', 'isADMSChief'])->group(function (){
    Route::get('/home', [App\Http\Controllers\ADMSController::class, 'ADMSChiefHome'])->name('chief-home');
    Route::get('/approval/{id}', [App\Http\Controllers\ADMSController::class, 'ADMSChiefView'])->name('ADMSChiefView');
    Route::post('/update-chief-approval/{id}', [App\Http\Controllers\ADMSController::class, 'ADMSChiefUpdate'])->name('ADMSChiefUpdate');
});

Route::prefix('ats-evaluator')->middleware(['auth', 'isATSEvaluator'])->group(function (){
    Route::get('/evaluation/{id}', [App\Http\Controllers\ATSController::class, 'showHeightEvaluation'])->name('ATSEvaluation');
    Route::post('/update-eval/{id}', [App\Http\Controllers\ATSController::class, 'ATSEvalUpdate'])->name('ATSEvalUpdate');
    Route::get('/proceed-to-supervisor', [App\Http\Controllers\ATSController::class, 'proceedToSupervisor'])->name('ATStoSupervisor');
});

Route::prefix('ats-supervisor')->middleware(['auth', 'isATSSupervisor'])->group(function (){
    Route::get('/evaluation/{id}', [App\Http\Controllers\ATSController::class, 'ATSSupervisor'])->name('ATSSupervisorView');
    Route::post('/update-eval/{id}', [App\Http\Controllers\ATSController::class, 'ATSSupervisorUpdate'])->name('ATSSupervisorUpdate');
    Route::get('/proceed-to-chief', [App\Http\Controllers\ATSController::class, 'proceedToChief'])->name('ATStoChief');
});
Route::prefix('ats-chief')->middleware(['auth', 'isATSChief'])->group(function (){
    Route::get('/home', [App\Http\Controllers\ATSController::class, 'ATSChiefHome'])->name('ATSChiefHome');
    Route::get('/approval/{id}', [App\Http\Controllers\ATSController::class, 'ATSChiefView'])->name('ATSChiefView');
    Route::post('/update-chief-approval/{id}', [App\Http\Controllers\ATSController::class, 'ATSChiefUpdate'])->name('ATSChiefUpdate');
});

Route::prefix('ans-evaluator')->middleware(['auth', 'isANSEvaluator'])->group(function (){
    Route::get('/evaluation/{id}', [App\Http\Controllers\ANSController::class, 'showHeightEvaluation'])->name('ANSEvaluation');
    Route::post('/update-eval/{id}', [App\Http\Controllers\ANSController::class, 'ANSEvalUpdate'])->name('ANSEvalUpdate');
    Route::get('/proceed-to-supervisor', [App\Http\Controllers\ANSController::class, 'proceedToSupervisor'])->name('ANStoSupervisor');
});
Route::prefix('ans-supervisor')->middleware(['auth', 'isANSSupervisor'])->group(function (){
    Route::get('/evaluation/{id}', [App\Http\Controllers\ANSController::class, 'ANSSupervisor'])->name('ANSSupervisorView');
    Route::post('/update-eval/{id}', [App\Http\Controllers\ANSController::class, 'ANSSupervisorUpdate'])->name('ANSSupervisorUpdate');
    Route::get('/proceed-to-chief', [App\Http\Controllers\ANSController::class, 'proceedToChief'])->name('ANStoChief');
});
Route::prefix('ans-chief')->middleware(['auth', 'isANSChief'])->group(function (){
    Route::get('/home', [App\Http\Controllers\ANSController::class, 'ANSChiefHome'])->name('ANSChiefHome');
    Route::get('/approval/{id}', [App\Http\Controllers\ANSController::class, 'ANSChiefView'])->name('ANSChiefView');
    Route::post('/update-chief-approval/{id}', [App\Http\Controllers\ANSController::class, 'ANSChiefUpdate'])->name('ANSChiefUpdate');
});
// Non-Compliance Route
Route::get('/non-compliant', [App\Http\Controllers\HomeController::class, 'noncompliant'])->name('non-compliant');

// URL PROTECTION
Route::middleware(['checkPaymentCompleted'])->group(function () {
    // Routes protected by checking payment completion
});

Route::middleware(['payment.completed'])->group(function () {
    // Routes protected by payment completion middleware
});


// APPLICATION FORM
Route::get('/owner-form', [ApplicationFormController::class, 'apply_owner_view'])->name('owner-form');
Route::get('/application/{application_id}', [App\Http\Controllers\ApplicationFormController::class, 'application_form'])->name('upload');
Route::post('/submit-owner-details' ,[ApplicationFormController::class, 'submit_owner_details'])->name('submitOwnerDetails');
Route::post('/submit-application', [ApplicationFormController::class, 'submitForm'])->name('submitApplication');

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



Route::get('form-data/{id}', [ApplicationFormController::class, 'getFormData']);
Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generate-pdf');
