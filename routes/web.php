<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\LoginTrueMiddleware;
use App\Http\Middleware\LoginFalseMiddleware;
// use App\Http\Middleware\Admin;
// use App\Http\Middleware\User;
use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CommentController;

// Route::get('/', function () {
//     if (Auth::check()) {
//         if (Auth::user()->role_id === 1) {
//             return redirect('/admin/dashboard'); // Admin
//         } elseif (Auth::user()->role_id === 2) {
//             return redirect('/user/dashboard'); // User
//         }
//     }
//     return redirect('/login'); // Jika belum login
// });

// Route::get('/article/show', function () {
//     return view('article.show');
// });

Route::middleware(LoginTrueMiddleware::class)->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login/proses', [AuthController::class, 'login_proses'])->name('login.proses');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/proses', [AuthController::class, 'register_proses'])->name('register.proses');
});

Route::middleware(LoginFalseMiddleware::class)->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/article/{article}/like', [ArticleController::class, 'like'])->name('article.like');
    Route::get('/article/search', [ArticleController::class, 'search'])->name('article.search');
    Route::get('/article/history', [ArticleController::class, 'history'])->name('article.history');
    Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article/show/{id}', [ArticleController::class, 'show'])->name('article.show');
    Route::delete('/article/destroy{article}', [ArticleController::class, 'destroy'])->name('article.destroy');

    Route::post('/article/{articleId}/comment', [CommentController::class, 'store'])->name('comment.store');

    Route::get('/admin/article', [AdminArticleController::class, 'index'])->name('admin.article.index');
    Route::get('/admin/article/create', [AdminArticleController::class, 'create'])->name('admin.article.create');
    Route::post('/admin/article', [AdminArticleController::class, 'store'])->name('admin.article.store');
    Route::get('/admin/article/{article}', [AdminArticleController::class, 'show'])->name('admin.article.show');
    Route::get('/admin/article/{article}/edit', [AdminArticleController::class, 'edit'])->name('admin.article.edit');
    Route::put('/admin/article/{article}', [AdminArticleController::class, 'update'])->name('admin.article.update');
    Route::delete('/admin/article/{article}', [AdminArticleController::class, 'destroy'])->name('admin.article.destroy');

    Route::get('/admin/category', [AdminCategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/category', [AdminCategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/{category}', [AdminCategoryController::class, 'show'])->name('admin.category.show');
    Route::get('/admin/category/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/admin/category/{category}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/admin/category/{category}', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('/admin/user', [AdminUserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/create', [AdminUserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user', [AdminUserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/{user}', [AdminUserController::class, 'show'])->name('admin.user.show');
    Route::get('/admin/user/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/user/{user}', [AdminUserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/user/{user}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');
});

// Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
//     ->name('admin.dashboard')
//     ->middleware(Admin::class);

// Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])
//     ->name('user.dashboard')
//     ->middleware(User::class);
