<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\ServiceController;
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

// Services Catalog & Deep-dive Details
Route::get('/layanan', [ServiceController::class, 'index'])->name('services.index');
Route::get('/layanan/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Blog & Educational Insights Engine
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Package Checkout & Payment Routes
Route::get('/checkout/{package:slug}', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout/{package:slug}', [CheckoutController::class, 'process'])->middleware('throttle:10,1')->name('checkout.process');
Route::get('/checkout/payment/{order:order_code}', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::post('/checkout/payment/{order:order_code}/simulate', [CheckoutController::class, 'simulatePayment'])->name('checkout.simulate');

// Midtrans Payment Webhook Notification
Route::post('/api/payment/notification', [CheckoutController::class, 'webhookNotification'])->name('payment.webhook');

// Diagnostic Health Monitoring Endpoint (UptimeRobot / Docker / Status)
Route::get('/api/health', [\App\Http\Controllers\HealthController::class, 'check'])->name('api.health');

// Lead Capture (Contact Brief Form with Rate Limiter)
Route::post('/leads', [LeadController::class, 'store'])->middleware('throttle:6,1')->name('leads.store');

// Newsletter & Wawasan Digital Subscription
Route::post('/newsletter', [\App\Http\Controllers\NewsletterController::class, 'subscribe'])->middleware('throttle:5,1')->name('newsletter.subscribe');

// Legal & Compliance Pages (UU PDP & SLA)
Route::get('/kebijakan-privasi', [LegalController::class, 'privacyPolicy'])->name('legal.privacy');
Route::get('/syarat-ketentuan', [LegalController::class, 'termsOfService'])->name('legal.terms');

// Multi-Language Switcher (ID / EN)
Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['id', 'en'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('lang.switch');

// Authentication Routes (Guest Only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Client Portal (Client Dashboard, Brief Tracker, & Notifications)
    Route::prefix('portal')->name('portal.')->group(function () {
        Route::get('/dashboard', [PortalController::class, 'dashboard'])->name('dashboard');
        Route::post('/orders/{order}/brief', [PortalController::class, 'storeBrief'])->name('brief.store');
        Route::get('/orders/{order}/invoice', [PortalController::class, 'invoice'])->name('orders.invoice');
        Route::patch('/notifications/{notification}/read', [PortalController::class, 'markNotificationAsRead'])->name('notifications.read');
    });

    // Admin Panel (Protected by 'admin' role middleware)
    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::patch('/orders/{order}/status', [AdminController::class, 'updateOrderStatus'])->name('orders.status');
        Route::patch('/leads/{lead}/status', [AdminController::class, 'updateLeadStatus'])->name('leads.status');
        Route::get('/payments/export-csv', [AdminController::class, 'exportPaymentsCsv'])->name('payments.export');

        // Client Direct Notifications
        Route::post('/users/{user}/notifications', [AdminController::class, 'sendNotification'])->name('users.notify');

        // Blog Article CMS
        Route::get('/blog/create', [AdminController::class, 'createBlog'])->name('blog.create');
        Route::post('/blog', [AdminController::class, 'storeBlog'])->name('blog.store');
        Route::get('/blog/{post}/edit', [AdminController::class, 'editBlog'])->name('blog.edit');
        Route::put('/blog/{post}', [AdminController::class, 'updateBlog'])->name('blog.update');
        Route::delete('/blog/{post}', [AdminController::class, 'destroyBlog'])->name('blog.destroy');

        // Legal Compliance Pages CMS
        Route::get('/legal/{pageLegal}/edit', [AdminController::class, 'editLegal'])->name('legal.edit');
        Route::put('/legal/{pageLegal}', [AdminController::class, 'updateLegal'])->name('legal.update');

        // Package Management
        Route::patch('/packages/{package}/toggle', [AdminController::class, 'togglePackage'])->name('packages.toggle');
    });
});

