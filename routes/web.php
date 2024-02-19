<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ActivityLogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('auth.login');
    }
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('users', \App\Http\Controllers\UsersController::class);
});

require __DIR__.'/auth.php';


// Package bzw. Produktcontroller
Route::resource("packages", "App\Http\Controllers\PackageController");

// Customercontroller
Route::resource("customers", "App\Http\Controllers\CustomerController");

// Webscontroller (Webspaces)
Route::resource("webs", "App\Http\Controllers\WebController");

// Ordercontroller
Route::resource("orders", "App\Http\Controllers\OrderController");


//logging
Route::get('/logging', [ActivityLogController::class, 'index'])->name('logging');

Route::get('/log-details/{id}', [ActivityLogController::class, 'showDetails'])->name('details');
