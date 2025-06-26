<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Recruiter\JobManager;
use App\Livewire\Recruiter\AssignJob;
use App\Livewire\Cleaner\WithdrawEarnings;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('/cleanerdashboard', function () {
        return view('cleanerdashboard');
    })->name('cleanerdashboard');
    Route::get('/recruiterdashboard', function () {
        return view('recruiterdashboard');
    })->name('recruiterdashboard');

    Route::get('/recruiter/jobs', JobManager::class)->name('recruiter.jobs');
    Route::get('/recruiter/assign-job', AssignJob::class)->name('recruiter.assign-job');
    Route::get('/cleaner/withdraw', WithdrawEarnings::class)->name('cleaner.withdraw');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

require __DIR__.'/auth.php';
