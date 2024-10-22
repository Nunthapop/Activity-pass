<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'cache.headers:no_store;no_cache;must_revalidate;max_age=0',
    ])->group(function () {
        // Route::get('/login', [LoginController::class, 'index'])->name('login');
        // Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        // Route::get('/reward', [RewardController::class, 'index'])->name('reward');
        // Route::get('/student', [StudentController::class, 'index'])->name('student');
    });
