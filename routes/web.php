<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\IncubatorController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\FundingController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
     return view('about');
 })->name('about');
 

 // Contact Us Page
Route::get('/contact', function () {
     return view('contact');
 })->name('contact');
 
 // Contact Form Submission (dummy for now)
 Route::post('/contact/submit', function () {
     // Handle form submission logic here (save to DB or send email)
     return back()->with('success', 'Thank you for contacting us!');
 })->name('contact.submit');
 

Route::middleware(['auth'])->group(function () {
    // Startups
    Route::resource('startups', StartupController::class);
    
    // Incubators
    Route::resource('incubators', IncubatorController::class);
    Route::get('incubators/{incubator}/dashboard', [IncubatorController::class, 'dashboard'])->name('incubators.dashboard');
    
    // Mentors
    Route::resource('mentors', MentorController::class);
    Route::post('mentors/{mentor}/connect', [MentorController::class, 'connectToStartup'])->name('mentors.connect');
    
    // Funding
    Route::resource('funding', FundingController::class);
    Route::post('funding/{funding}/apply', [FundingController::class, 'apply'])->name('funding.apply');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Password Reset Routes
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])
     ->name('password.request');

Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])
     ->name('password.email');

Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])
     ->name('password.reset');

Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])
     ->name('password.update');

     Route::put('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
