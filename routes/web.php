<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActiveBusinessController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SupportController;
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

// Guest pages
include('auth.php');
Route::get('/', [PageController::class, 'index'])->name('home');

// Legals pages
Route::get('/mentions-legales', [PageController::class, 'mentionsLegales'])->name('mentions_legales');
Route::get('/politique-confidentialite', [PageController::class, 'politiqueConfidentialite'])->name('politique_confidentialite');
Route::get('/conditions-generales-utilisation', [PageController::class, 'conditionsGeneralesUtilisation'])->name('conditions_utilisation');
Route::post('/support', [PageController::class, 'support'])->name('send_support');

// Dashboard routes
Route::prefix('dashboard')
    ->middleware(['auth', 'verified', 'active_business'])
    ->name('dashboard.')->group(function ()
    {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('/active_business', ActiveBusinessController::class)->only(['edit']);
        Route::resource('/business', BusinessController::class);
        Route::resource('/customer', CustomerController::class);
        Route::resource('/quotation', QuotationController::class);
        Route::get('/quotation/{quotation}/pdf', [QuotationController::class, 'pdf'])->name('quotation.pdf');
        Route::resource('/invoice', InvoiceController::class)->except(['destroy', 'edit', 'update']);
        Route::get('/invoice/{invoice}/pdf', [InvoiceController::class, 'pdf'])->name('invoice.pdf');
        Route::resource('/support', SupportController::class)->only(['create', 'store']);
        Route::resource('/account', AccountController::class)->only(['edit', 'update', 'destroy']);
    }
);
