<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Webkita Web Development & UI/UX Studio
|--------------------------------------------------------------------------
*/

// SEO & Search Engine Indexing
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('seo.sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('seo.robots');

// Public Presentation & Services Homepage
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Blog & Educational Insights Engine
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Package Checkout & Payment Routes
Route::get('/checkout/{package:slug}', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout/{package:slug}', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/payment/{order:order_code}', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::post('/checkout/payment/{order:order_code}/simulate', [CheckoutController::class, 'simulatePayment'])->name('checkout.simulate');

// Midtrans Payment Webhook Notification
Route::post('/api/payment/notification', [CheckoutController::class, 'webhookNotification'])->name('payment.webhook');

// Lead Capture (Contact Brief Form)
Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');

// Legal & Compliance Pages (UU PDP & SLA)
Route::get('/kebijakan-privasi', [LegalController::class, 'privacyPolicy'])->name('legal.privacy');
Route::get('/syarat-ketentuan', [LegalController::class, 'termsOfService'])->name('legal.terms');

// Authentication Routes (Guest Only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Client Portal (Client Dashboard & Brief Tracker)
    Route::prefix('portal')->name('portal.')->group(function () {
        Route::get('/dashboard', [PortalController::class, 'dashboard'])->name('dashboard');
        Route::post('/orders/{order}/brief', [PortalController::class, 'storeBrief'])->name('brief.store');
        Route::get('/orders/{order}/invoice', [PortalController::class, 'invoice'])->name('orders.invoice');
    });

    // Admin Panel (Protected by 'admin' role middleware)
    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::patch('/orders/{order}/status', [AdminController::class, 'updateOrderStatus'])->name('orders.status');
        Route::patch('/leads/{lead}/status', [AdminController::class, 'updateLeadStatus'])->name('leads.status');
        Route::get('/payments/export-csv', [AdminController::class, 'exportPaymentsCsv'])->name('payments.export');
    });
});
