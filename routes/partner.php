<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Partner\ProgramController;
use App\Http\Controllers\Partner\PartnerApplicationController;

/*
|--------------------------------------------------------------------------
| Partner Routes
|--------------------------------------------------------------------------
*/

Route::prefix('partner')->group(static function () {

    // Guest routes
    Route::middleware('guest:partner')->group(static function () {
        // Auth routes
        Route::get('login', [\App\Http\Controllers\Partner\Auth\AuthenticatedSessionController::class, 'create'])->name('partner.login');
        Route::post('login', [\App\Http\Controllers\Partner\Auth\AuthenticatedSessionController::class, 'store']);
        // Registration route
        Route::get('register', [\App\Http\Controllers\Partner\Auth\RegisteredPartnerController::class, 'create'])->name('partner.register');
        Route::post('register', [\App\Http\Controllers\Partner\Auth\RegisteredPartnerController::class, 'store']);
        // Forgot password
        Route::get('forgot-password', [\App\Http\Controllers\Partner\Auth\PasswordResetLinkController::class, 'create'])->name('partner.password.request');
        Route::post('forgot-password', [\App\Http\Controllers\Partner\Auth\PasswordResetLinkController::class, 'store'])->name('partner.password.email');
        // Reset password
        Route::get('reset-password/{token}', [\App\Http\Controllers\Partner\Auth\NewPasswordController::class, 'create'])->name('partner.password.reset');
        Route::post('reset-password', [\App\Http\Controllers\Partner\Auth\NewPasswordController::class, 'store'])->name('partner.password.update');
    });

    // Authenticated routes
    Route::middleware(['auth:partner'])->group(static function () {
        // Confirm password routes
        Route::get('confirm-password', [\App\Http\Controllers\Partner\Auth\ConfirmablePasswordController::class, 'show'])->name('partner.password.confirm');
        Route::post('confirm-password', [\App\Http\Controllers\Partner\Auth\ConfirmablePasswordController::class, 'store']);
        // Logout route
        Route::post('logout', [\App\Http\Controllers\Partner\Auth\AuthenticatedSessionController::class, 'destroy'])->name('partner.logout');
        // General routes
        Route::get('/', [\App\Http\Controllers\Partner\HomeController::class, 'index'])->name('partner.index');
        Route::get('details/create', [\App\Http\Controllers\Partner\PartnerDetailController::class, 'create'])->name('partner.details.create');
        Route::post('details/store', [\App\Http\Controllers\Partner\PartnerDetailController::class, 'store'])->name('partner.details.store');
        Route::get('profile', [\App\Http\Controllers\Partner\HomeController::class, 'profile'])->middleware('password.confirm.partner')->name('partner.profile');

        // Program routes
        Route::get('/programs', [ProgramController::class, 'index'])->name('program.index'); // List posts
        Route::get('/programs/create', [ProgramController::class, 'create'])->name('program.create'); // Create form
        Route::post('/programs', [ProgramController::class, 'store'])->name('program.store'); // Store new post
        Route::get('programs/{slug}', [ProgramController::class, 'show'])->name('program.show');
        Route::delete('/programs/{slug}', [ProgramController::class, 'destroy'])->name('program.destroy'); // Delete post
        Route::get('/programs/{slug}/edit', [ProgramController::class, 'edit'])->name('program.edit');
        Route::put('/programs/{slug}', [ProgramController::class, 'update'])->name('program.update');
        // Partner Application routes
        Route::get('/applications', [PartnerApplicationController::class, 'index'])->name('application.index');  // View all applications
        Route::get('/applications', [PartnerApplicationController::class, 'index'])->name('partner.applications.index');
        Route::get('/applications/{id}', [PartnerApplicationController::class, 'show'])->name('partner.applications.show');
        Route::put('/applications/{id}', [PartnerApplicationController::class, 'update'])->name('partner.applications.update');

    });
});
