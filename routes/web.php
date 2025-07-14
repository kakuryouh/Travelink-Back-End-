<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Tour;
use App\Models\TourTag;
use App\Models\TourImage;
use App\Models\Booking;
use App\Models\Transaction;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ViewAllTourController;
use App\Http\Controllers\TourDetailController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuideProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TourReviewController;


// 1. Homepage Route
// This will redirect users to the correct page based on their login status.
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard.view');
    }
    return redirect()->route('login');
})->name('login');

Route::middleware(['auth', 'verified'])->group(function () {
    // Logout Route
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Profile Routes
    Route::get('profile', [UserProfileController::class, 'view'])->name('Profile.view');

    Route::patch('profile', [UserProfileController::class, 'update'])->name('Profile.update');

    Route::post('/profile/photo', [UserProfileController::class, 'updatePhoto'])->name('profile.photo.update');

    //dashboard review
    Route::get('dashboard', [DashboardController::class, 'view'])->name('dashboard.view');

    //Tours Route
    Route::get('ViewAllTour', [ViewAllTourController::class, 'view'])->name('Tours.view');

    Route::get('/tours/{tour}/{slug?}', [TourDetailController::class, 'show'])->name('tour.show');

    // Booking Route
    Route::get('Bookings', [BookingController::class, 'view'])->name('Bookings');

    Route::post('TourReview', [TourReviewController::class, 'create'])->name('TourReview.create');
    // Route::post('GUideReview', );

    //Guide profile Route
    Route::get('/GuideProfile/{guide}', [GuideProfileController::class, 'user_view'])->name('guideprofile.userview');

    //Payment Route
    Route::get('/Payment/{transaction}/Payment-Details', [PaymentController::class, 'view'])->middleware('nocache')->name('Payment.create');

    Route::post('/transaction/create', [TransactionController::class, 'store'])->name('transaction.store');

    Route::post('/transaction/update', [TransactionController::class, 'update'])->name('transaction.update');
});

// Login Routes
// The 'guest' middleware ensures that logged-in users cannot see the login page.
Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->middleware('guest')
            ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
            ->middleware('guest');

// Register Routes
Route::get('register', [RegisteredUserController::class, 'create'])
            ->middleware('guest')
            ->name('register');

Route::post('register', [RegisteredUserController::class, 'store'])
            ->middleware('guest');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
