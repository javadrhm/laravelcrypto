<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AssistantController;

use App\Http\Controllers\PostController;

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\AdminController;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
    Route::get('/assistant', [AssistantController::class, 'index'])
        ->name('assistant.index');

    Route::post('/assistant/analyze', [AssistantController::class, 'analyze'])
        ->name('assistant.analyze');
    Route::post('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/failed', [PaymentController::class, 'failed'])->name('payment.failed');
    Route::get('/payment/{package}', [PaymentController::class, 'show'])->name('payment');
});

// Public Post Routes
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('posts', AdminPostController::class);
    });








require __DIR__.'/auth.php';



