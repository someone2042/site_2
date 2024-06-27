<?php

use App\Http\Controllers\categorierController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Define the home route
Route::get('/', [SiteController::class, 'index'])->name('index');

// Route for creating a new site (requires authentication)
Route::get('/creat', function () {
    return view('creat_site');
})->middleware('auth');

// Route for the login page
Route::get('/admin', [LoginController::class, 'login'])->name('login');
// Route for handling login authentication
Route::post('/authentification', [LoginController::class, 'authentification'])->name('authentification');

// Route for user registration (requires authentication)
Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('auth');
// Route for user profile (requires authentication)
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
// Route for storing user data (requires authentication)
Route::post('/store', [UserController::class, 'store'])->name('store')->middleware('auth');
// Route for updating user data (requires authentication)
Route::put('/user/update/{user}', [UserController::class, 'update'])->name('update')->middleware('auth');
// Route for deleting user data (requires authentication)
Route::get('/user/delete/{user}', [UserController::class, 'delete'])->name('delete')->middleware('auth');
// Route for updating administrator data (requires authentication)
Route::get('/update/admin', [UserController::class, 'modif'])->name('delete')->middleware('auth');

// Route for user logout (requires authentication)
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route for creating a new site (requires authentication)
Route::get('/create', [SiteController::class, 'site_create'])->name('create')->middleware('auth');
// Route for updating a site (requires authentication)
Route::get('/site/update/{site}', [SiteController::class, 'site_update'])->name('update')->middleware('auth');
// Route for storing site data (requires authentication)
Route::post('/site/store', [SiteController::class, 'store'])->name('site.store')->middleware('auth');
// Route for updating site data (requires authentication)
Route::put('/site/update/{site}', [SiteController::class, 'update'])->name('site.update')->middleware('auth');
// Route for deleting site data (requires authentication)
Route::delete('/site/delete/{site}', [SiteController::class, 'delete'])->name('site.delete')->middleware('auth');

// Route for storing categorier data (requires authentication)
Route::post('/categorier/store', [categorierController::class, 'store'])->name('categorier.store')->middleware('auth');
// Route for updating categorier data (requires authentication)
Route::put('/categorier/update/{categorier}', [categorierController::class, 'update'])->name('categorier.update')->middleware('auth');
// Route for deleting categorier data (requires authentication)
Route::delete('/categorier/delete', [categorierController::class, 'delete'])->name('categorier.delete')->middleware('auth');

// Route for displaying a specific site
Route::get('/{id}', [SiteController::class, 'site'])->name('site');
