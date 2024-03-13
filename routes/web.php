<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PostedJobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('job-list', [GuestController::class, 'jobList'])->name('jobList');
Route::get('seeker-list', [GuestController::class, 'candidateList'])->name('seekerList');


Route::middleware(['guest'])->group(function () {
 
    Route::get('/', function () {
        return to_route('login');
    })->name('home');
   
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
    
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('jobs', [PostedJobController::class, 'index'])->name('postJob.index');
    Route::get('jobs/create', [PostedJobController::class, 'postJob'])->name('postJob.create');
    Route::get('jobs/{jobId}/edit', [PostedJobController::class, 'editJob'])->name('postJob.edit');
    Route::post('jobs', [PostedJobController::class, 'storePostJob'])->name('postJob.store');
    Route::put('jobs/update/{jobId}', [PostedJobController::class, 'updatePostJob'])->name('postJob.update');
    Route::delete('jobs/{jobId}', [PostedJobController::class, 'deletePost'])->name('postJob.delete');

    Route::post('apply', [ApplicationController::class, 'applyJob'])->name('application.apply');
    Route::get('applied-jobs', [ApplicationController::class, 'appliedJobs'])->name('application.jobs');

    Route::delete('resume', [ProfileController::class,'resumeDelete'])->name('resume.delete');

    
});
    
