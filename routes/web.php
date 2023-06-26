<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SneakerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;

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

// Home route
Route::get('/', function () {
    return view('home');
})->name('home');

// Registration routes
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('users.showRegistrationForm');
Route::post('/register', [UserController::class, 'register'])->name('users.register');

// Login and logout routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('users.showLoginForm');
Route::post('/login', [UserController::class, 'login'])->name('users.login');
Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');

Route::get('/sneakers/search', [SneakerController::class, 'search'])->name('sneakers.search');


Route::middleware(['auth'])->group(function () {
    // Profile routes
    Route::get('/profile', [UserController::class, 'showProfile'])->name('users.showProfile');
    Route::get('/profile/edit', [UserController::class, 'showEditForm'])->name('users.showEditForm');
    Route::put('/profile/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/profile/delete', [UserController::class, 'destroy'])->name('users.destroy');

    // Contact routes
    Route::get('/contact', [ContactController::class, 'showcontactForm'])->name('contacts.showcontactForm');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

    // Like route
    Route::post('/sneakers/{sneaker}/like', [LikeController::class, 'toggleLike'])->name('sneakers.like');

    // Sneaker routes
    Route::get('/sneakers', [SneakerController::class, 'index']);
    Route::get('/sneakers/{id}', [SneakerController::class, 'detail'])->name('sneakers.detail');
});






// Admin routes
Route::middleware(['admin'])->group(function () {
    Route::get('/sneakers_create', [SneakerController::class, 'create'])->name('sneakers.create');
    Route::get('/admin', [UserController::class, 'adminView'])->name('admin.view');
    Route::get('/admincontacts', [ContactController::class, 'index'])->name('contacts.view');
    Route::delete('/admincontacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::post('/sneakers_create', [SneakerController::class, 'store'])->name('sneakers.store');
    Route::get('/sneakers/{sneaker}/edit', [SneakerController::class, 'edit'])->name('sneakers.edit');
    Route::put('/sneakers/{sneaker}', [SneakerController::class, 'update'])->name('sneakers.update');
    Route::delete('/sneakers/{sneaker}', [SneakerController::class, 'destroy'])->name('sneakers.destroy');
});

// Error routes
Route::view('/404', 'errors.404')->name('404');
Route::view('/500', 'errors.500')->name('500');
