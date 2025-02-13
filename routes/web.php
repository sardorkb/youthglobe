<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\ApplicationController;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will be
| assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route to show all partners
Route::get('/partners', [FrontendController::class, 'showPartners'])->name('partners');
Route::get('/programs', [FrontendController::class, 'showPrograms'])->name('programs');

// Route to show a single partner with details
Route::get('/partners/{id}', [FrontendController::class, 'showPartnerDetails'])->name('frontend.partner.details');
// Route to show a single partner with details
Route::get('/programs/{id}', [FrontendController::class, 'showProgramDetails'])->name('frontend.program.details');

// Static pages
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about.us');
Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('contact.us');

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// User Details routes inside authenticated group
Route::middleware('auth')->group(function () {
    // Show User Details (Dashboard)
    Route::get('details/create', [UserDetailsController::class, 'create'])->name('user.details.create');
    Route::post('details/store', [UserDetailsController::class, 'store'])->name('user.details.store');
    Route::get('details/{id}/edit', [UserDetailsController::class, 'edit'])->name('user.details.edit');
    Route::patch('details/{id}', [UserDetailsController::class, 'update'])->name('user.details.update');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Apply for a program (POST request)
    Route::post('applications', [ApplicationController::class, 'store'])->name('applications.store');

    // View a list of applications
    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');

    // View a specific application
    Route::get('applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');

    Route::post('/program/apply', [ApplicationController::class, 'store'])->name('frontend.program.apply');

});

require __DIR__.'/auth.php';
