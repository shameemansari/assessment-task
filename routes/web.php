<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes(['register' => false]);

Route::middleware(['guest'])->group(function () {


    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::view('employer-registration', 'auth.employer_register')->name('register.employer');
    Route::view('seeker-registration', 'auth.candidate_register')->name('register.seeker');
    Route::post('employer-registration', [RegisterController::class, 'employerRegistration'])->name('register.employer.post');
    Route::post('seeker-registration', [RegisterController::class, 'seekerRegistration'])->name('register.seeker.post');
});
