<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminPortfolioController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminApplicationController;


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

// Главная
Route::get('/', [MainController::class, 'index'])->name('main');

// Услуги
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/services/{slug}', [ServicesController::class, 'show']);

// Портфолио
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show']);

// О компании
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/about/{slug}', [AboutController::class, 'show']);

// Контакты
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Услуги
    Route::resource('/admin/services', AdminServiceController::class)->names([
        'index' => 'admin.services.index',
        'create' => 'admin.services.create',
        'store' => 'admin.services.store',
        'show' => 'admin.services.show',
        'edit' => 'admin.services.edit',
        'update' => 'admin.services.update',
        'destroy' => 'admin.services.destroy'
    ]);

    // Портфолио
    Route::resource('/admin/portfolio', AdminPortfolioController::class)->names([
        'index' => 'admin.portfolio.index',
        'create' => 'admin.portfolio.create',
        'store' => 'admin.portfolio.store',
        'show' => 'admin.portfolio.show',
        'edit' => 'admin.portfolio.edit',
        'update' => 'admin.portfolio.update',
        'destroy' => 'admin.portfolio.destroy'
    ]);

    // Новости
    Route::resource('/admin/news', AdminNewsController::class)->names([
        'index' => 'admin.news.index',
        'create' => 'admin.news.create',
        'store' => 'admin.news.store',
        'show' => 'admin.news.show',
        'edit' => 'admin.news.edit',
        'update' => 'admin.news.update',
        'destroy' => 'admin.news.destroy'
    ]);

    // Обратная связь(заявки)
    Route::get('/admin/applications', [AdminApplicationController::class, 'index'])->name('admin.applications.index');
    Route::get('/applications/{application}', [AdminApplicationController::class, 'show'])->name('admin.applications.show');
    Route::put('/admin/applications/{application}/mark-as-processed', [AdminApplicationController::class, 'markAsProcessed'])->name('applications.markAsProcessed');
});

require __DIR__ . '/auth.php';
