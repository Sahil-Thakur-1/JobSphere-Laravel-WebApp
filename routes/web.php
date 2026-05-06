<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HirerController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//main dashboard
Route::get('/dashboard',[CommonController::class,'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

//common
Route::get('/job/details/{id}',[CommonController::class,'getJobDetails']);

//profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//hirer
Route::prefix('/hirer')->middleware(['auth', 'verified'])->group(function(){
 Route::get('/jobs',[HirerController::class,'getJobsAndSkills'])->name('hirer-jobs');
 Route::get('/details',[HirerController::class,'getDetails'])->name('hirer-details');
 Route::post('/hirer/add-update-details',[HirerController::class,'addUpdateDetails']);
 Route::post('/job-posts',[HirerController::class,'addJobs']);
 Route::get('/application',[HirerController::class,'getJobApplication'])->name('hirer-applications');
 Route::patch('/applications/{userId}/status/{jobId}',[HirerController::class,'updateApplicationStatus']);
});

//job_seeker
Route::prefix('/job-seeker')->middleware(['auth','verified'])->group(function(){
Route::get('/jobs',[JobSeekerController::class,'showJobs'])->name('job-seeker-jobs');
Route::get('/details',[JobSeekerController::class,'showDetails'])->name('job-seeker-details');
Route::put('details/update',[JobSeekerController::class,'updateDetail']);
Route::post('/work-experience/store',[JobSeekerController::class,'addExperience']);
Route::post('/education/store',[JobSeekerController::class,'addEducation']);
Route::delete('/work-experience/{id}',[JobSeekerController::class,'deleteExperience']);
Route::delete('/education/{id}',[JobSeekerController::class,'deleteEducation']);
Route::post('/job/apply/{id}',[JobSeekerController::class,'applyJob']);
Route::get('/applied',[JobSeekerController::class,'getAppliedJobs'])->name('applied-jobs');
});

require __DIR__.'/auth.php';
