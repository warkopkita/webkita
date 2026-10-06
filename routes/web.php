<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\LegalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Webkita Web Development & UI/UX Studio
|--------------------------------------------------------------------------
*/

// Public Presentation & Services Homepage
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Lead Capture (Contact Brief Form)
Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');

// Legal & Compliance Pages (UU PDP & SLA)
Route::get('/kebijakan-privasi', [LegalController::class, 'privacyPolicy'])->name('legal.privacy');
Route::get('/syarat-ketentuan', [LegalController::class, 'termsOfService'])->name('legal.terms');
