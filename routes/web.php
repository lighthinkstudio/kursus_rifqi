<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// ADMIN
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/login', [
    AuthController::class, 'login'
])->name('login');
Route::post('/logout', [
    AuthController::class, 'logout'
])->name('logout');

Route::middleware(['auth:web'])->prefix('admin')->name('admin.')->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [
        DashboardController::class, 'index'
    ])->name('dashboard');

    // USERS
    Route::get('/user', [
        UserController::class, 'index'
    ])->name('user');
    Route::get('/user/tambah', [
        UserController::class, 'create'
    ])->name('tambah_user');
    Route::post('/user/simpan', [
        UserController::class, 'store'
    ])->name('simpan_user');
    Route::get('/user/edit/{id}', [
        UserController::class, 'edit'
    ])->name('edit_user');
    Route::patch('/user/update/{id}', [
        UserController::class, 'update'
    ])->name('update_user');
    Route::delete('/user/hapus/{id}', [
        UserController::class, 'destroy'
    ])->name('hapus_user');
    Route::put('/user/password/{id}', [
        UserController::class, 'password'
    ])->name('password_user');
});