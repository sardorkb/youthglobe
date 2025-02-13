<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostTagController;
use App\Http\Controllers\Admin\PostController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(static function () {

    // Guest routes
    Route::middleware('guest:admin')->group(static function () {
        // Auth routes
        Route::get('login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'store']);
        // Forgot password
        Route::get('forgot-password', [\App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'create'])->name('admin.password.request');
        Route::post('forgot-password', [\App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'store'])->name('admin.password.email');
        // Reset password
        Route::get('reset-password/{token}', [\App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'create'])->name('admin.password.reset');
        Route::post('reset-password', [\App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'store'])->name('admin.password.update');
    });

    // Verify email routes
    Route::middleware(['auth:admin'])->group(static function () {
        Route::get('verify-email', [\App\Http\Controllers\Admin\Auth\EmailVerificationPromptController::class, '__invoke'])->name('admin.verification.notice');
        Route::get('verify-email/{id}/{hash}', [\App\Http\Controllers\Admin\Auth\VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('admin.verification.verify');
        Route::post('email/verification-notification', [\App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('admin.verification.send');
    });

    // Authenticated routes
    Route::middleware(['auth:admin', 'verified'])->group(static function () {
        
        // Confirm password routes
        Route::get('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'show'])->name('admin.password.confirm');
        Route::post('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'store']);

        // Logout route
        Route::post('logout', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

        // General routes
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');
        Route::get('profile', [\App\Http\Controllers\Admin\HomeController::class, 'profile'])->middleware('password.confirm.admin')->name('admin.profile');
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
        Route::get('partners', [App\Http\Controllers\Admin\PartnerManageController::class, 'index'])->name('partners.index');
        Route::get('approval', [App\Http\Controllers\Admin\PartnerManageController::class, 'approval'])->name('partners.approval');
        Route::post('approve/{id}', [App\Http\Controllers\Admin\PartnerManageController::class, 'approve'])->name('partners.approve');
        Route::post('reject/{id}', [App\Http\Controllers\Admin\PartnerManageController::class, 'reject'])->name('partners.reject');
        Route::get('partners/{id}', [App\Http\Controllers\Admin\PartnerManageController::class, 'show'])->name('partners.show');

        // Post Category Section
        Route::get('post-category', [PostCategoryController::class, 'index'])->name('post-category.index');
        Route::get('post-category/create', [PostCategoryController::class, 'create'])->name('post-category.create');
        Route::post('post-category', [PostCategoryController::class, 'store'])->name('post-category.store');
        Route::get('post-category/{id}/edit', [PostCategoryController::class, 'edit'])->name('post-category.edit');
        Route::match(['put', 'patch'], 'post-category/{id}', [PostCategoryController::class, 'update'])->name('post-category.update');
        Route::delete('post-category/{id}', [PostCategoryController::class, 'destroy'])->name('post-category.destroy');

        // Post Tag Section
        Route::get('post-tag', [PostTagController::class, 'index'])->name('post-tag.index');
        Route::get('post-tag/create', [PostTagController::class, 'create'])->name('post-tag.create');
        Route::post('post-tag', [PostTagController::class, 'store'])->name('post-tag.store');
        Route::get('post-tag/{id}/edit', [PostTagController::class, 'edit'])->name('post-tag.edit');
        Route::match(['put', 'patch'], 'post-tag/{id}', [PostTagController::class, 'update'])->name('post-tag.update');
        Route::delete('post-tag/{id}', [PostTagController::class, 'destroy'])->name('post-tag.destroy');

        Route::get('/post', [PostController::class, 'index'])->name('post.index'); // List posts
        Route::get('/post/create', [PostController::class, 'create'])->name('post.create'); // Create form
        Route::post('/post', [PostController::class, 'store'])->name('post.store'); // Store new post
        Route::get('posts/{id}', [PostController::class, 'show'])->name('post.show');
        Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit'); // Edit form
        Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update'); // Update post
        Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy'); // Delete post

    });
});

