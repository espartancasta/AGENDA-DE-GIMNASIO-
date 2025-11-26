<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MembershipController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', UserController::class);
    });

    Route::middleware(['role:admin,staff'])->prefix('panel')->name('panel.')->group(function () {
        Route::resource('memberships', MembershipController::class);
    });

    Route::middleware(['role:client'])->prefix('client')->name('client.')->group(function () {
        Route::get('home', function () {
            return view('client.home');
        })->name('home');
    });
});

require __DIR__.'/auth.php';
