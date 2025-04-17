<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUser;
use Illuminate\Support\Facades\Route;

/* (No Authentication ) */

Route::view('home', 'home');
Route::view('registration', 'users.registration');
Route::view('login', 'users.login');

// User Authentication
Route::controller(UserController::class)->group(function () {
    Route::post("registration", "registration")->name("register");
    Route::post("login", "login")->name("login");
    Route::get("logout", "logout")->name("logout");
});

/*(Requires Authentication) */
Route::middleware([CheckUser::class])->group(function () {

    // Dashboard
    Route::get("dashboard", [UserController::class, "dashboard"])->name("dashboard");

    // Business Routes
    Route::resource("Business", BusinessController::class);
    // Route::view('create', 'business.create')->name('create');

    // Location Routes
    Route::controller(LocationController::class)->group(function () {
        Route::view('create', 'location.create')->name("create");
        Route::post('location', 'store')->name('location.store');
        Route::get('showLocation', 'showLocation')->name('showLocation');
        Route::delete('delete/{id}', 'delete');
        Route::get('show/{id}', 'show');
        Route::get('edit/{id}', 'edit');
        Route::put('update/{id}', 'update')->name('update');
    });

    // User Profile
    Route::get('profile/{id}', [UserController::class, 'profile']);
});

/* 🔹 Component & Layout Routes (No Auth Required) */
Route::prefix('components')->group(function () {
    Route::view("header", "components.header");
    Route::view("footer", "components.footer");
    Route::view("sidebar", "components.sidebar");
});

Route::view("theme", "template.theme");
