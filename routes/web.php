<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role_id === 1) {
            return redirect('/admin/dashboard'); // Admin
        } elseif (Auth::user()->role_id === 2) {
            return redirect('/user/dashboard'); // User
        }
    }
    return redirect('/login'); // Jika belum login
});

// Route::get('/kontol', function () {
//     return view('article.create');
// });
Route::get('/article/show', function () {
    return view('article.show');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login/proses', [AuthController::class, 'login_proses'])->name('login.proses');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/proses', [AuthController::class, 'register_proses'])->name('register.proses');

Route::get('/article/search', [ArticleController::class, 'search'])->name('article.search');
Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/show/{id}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
    ->name('admin.dashboard')
    ->middleware(Admin::class);

Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])
    ->name('user.dashboard')
    ->middleware(User::class);
