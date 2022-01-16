<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Guest/Index', [
        'canLogin' => true,
        'canRegister' => true,
        'laravelVersion' => '^8.40',
        'phpVersion' => '^7.4',
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard/Index');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/about', function () {
    return Inertia::render('Dashboard/About');
})->name('about');

Route::middleware(['auth:sanctum', 'verified'])->get('/users/{user}', function ($user) {
    return Inertia::render('Dashboard/Users/Show', [
        'current_user' => $user
    ]);
})->name('users.show');