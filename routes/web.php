<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Route;

// Dashboard app: the root sends everyone to the dashboard (guests are redirected to login).
Route::redirect('/', '/dashboard');

// Guest-only authentication pages.
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Everything below requires an authenticated user.
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Browse conferences and sessions (all authenticated users).
    Route::get('/conferences', [ConferenceController::class, 'index'])->name('conferences.index');
    Route::get('/conferences/{conference}', [ConferenceController::class, 'show'])
        ->whereNumber('conference')->name('conferences.show');

    Route::get('/sessions', [SessionController::class, 'index'])->name('sessions.index');

    // Registration and cancellation (all authenticated users).
    Route::post('/conferences/{conference}/register', [RegistrationController::class, 'registerConference'])
        ->whereNumber('conference')->name('conferences.register');
    Route::post('/conferences/{conference}/cancel', [RegistrationController::class, 'cancelConference'])
        ->whereNumber('conference')->name('conferences.cancel');
    Route::post('/sessions/{session}/register', [RegistrationController::class, 'registerSession'])
        ->whereNumber('session')->name('sessions.register');
    Route::post('/sessions/{session}/cancel', [RegistrationController::class, 'cancelSession'])
        ->whereNumber('session')->name('sessions.cancel');
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');

    // Staff area: administrators and organisers.
    Route::middleware('role:admin,organiser')->group(function () {
        // Conference management.
        Route::get('/conferences/create', [ConferenceController::class, 'create'])->name('conferences.create');
        Route::post('/conferences', [ConferenceController::class, 'store'])->name('conferences.store');
        Route::get('/conferences/{conference}/edit', [ConferenceController::class, 'edit'])
            ->whereNumber('conference')->name('conferences.edit');
        Route::put('/conferences/{conference}', [ConferenceController::class, 'update'])
            ->whereNumber('conference')->name('conferences.update');
        Route::delete('/conferences/{conference}', [ConferenceController::class, 'destroy'])
            ->whereNumber('conference')->name('conferences.destroy');

        // Venue management.
        Route::get('/venues', [VenueController::class, 'index'])->name('venues.index');
        Route::get('/venues/create', [VenueController::class, 'create'])->name('venues.create');
        Route::post('/venues', [VenueController::class, 'store'])->name('venues.store');
        Route::get('/venues/{venue}/edit', [VenueController::class, 'edit'])
            ->whereNumber('venue')->name('venues.edit');
        Route::put('/venues/{venue}', [VenueController::class, 'update'])
            ->whereNumber('venue')->name('venues.update');
        Route::delete('/venues/{venue}', [VenueController::class, 'destroy'])
            ->whereNumber('venue')->name('venues.destroy');

        // Session management.
        Route::get('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
        Route::post('/sessions', [SessionController::class, 'store'])->name('sessions.store');
        Route::get('/sessions/{session}/edit', [SessionController::class, 'edit'])
            ->whereNumber('session')->name('sessions.edit');
        Route::put('/sessions/{session}', [SessionController::class, 'update'])
            ->whereNumber('session')->name('sessions.update');
        Route::delete('/sessions/{session}', [SessionController::class, 'destroy'])
            ->whereNumber('session')->name('sessions.destroy');

        // Speaker management and session assignment.
        Route::get('/speakers', [SpeakerController::class, 'index'])->name('speakers.index');
        Route::get('/speakers/create', [SpeakerController::class, 'create'])->name('speakers.create');
        Route::post('/speakers', [SpeakerController::class, 'store'])->name('speakers.store');
        Route::get('/speakers/{speaker}/edit', [SpeakerController::class, 'edit'])
            ->whereNumber('speaker')->name('speakers.edit');
        Route::put('/speakers/{speaker}', [SpeakerController::class, 'update'])
            ->whereNumber('speaker')->name('speakers.update');
        Route::delete('/speakers/{speaker}', [SpeakerController::class, 'destroy'])
            ->whereNumber('speaker')->name('speakers.destroy');
        Route::get('/speakers/assign', [SpeakerController::class, 'showAssign'])->name('speakers.assign');
        Route::post('/speakers/assign', [SpeakerController::class, 'assign'])->name('speakers.assign.store');

        // Member management (attendees and speakers only).
        Route::get('/members', [MemberController::class, 'index'])->name('members.index');
        Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
        Route::post('/members', [MemberController::class, 'store'])->name('members.store');
        Route::get('/members/{member}/edit', [MemberController::class, 'edit'])
            ->whereNumber('member')->name('members.edit');
        Route::put('/members/{member}', [MemberController::class, 'update'])
            ->whereNumber('member')->name('members.update');
        Route::delete('/members/{member}', [MemberController::class, 'destroy'])
            ->whereNumber('member')->name('members.destroy');

        // Reports.
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    });
});