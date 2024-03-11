<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes(['register' => false, 'verify' => true]);

Route::middleware(['guest'])->group(function () {
 
    Route::get('/', function () {
        return to_route('login');
    })->name('home');

    Route::view('employer-registration', 'auth.employer_register')->name('register.employer');
    Route::view('seeker-registration', 'auth.candidate_register')->name('register.seeker');
    Route::post('employer-registration', [RegisterController::class, 'employerRegistration'])->name('register.employer.post');
    Route::post('seeker-registration', [RegisterController::class, 'seekerRegistration'])->name('register.seeker.post');
});
 
Route::middleware(['auth'])->group(function () {

    Route::controller(VerificationController::class)->group(function () {
        Route::get('/email/verify', 'show')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'verify')->middleware(['signed'])->name('verification.verify');
        Route::post('/email/resend', 'resend')->name('verification.resend');
    });

});


Route::middleware(['verified', 'auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
    
