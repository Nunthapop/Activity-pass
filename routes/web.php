<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'cache.headers:no_store;no_cache;must_revalidate;max_age=0',
])->group(function () {
    Route::controller(StudentController::class)
        ->prefix('student')
        ->name('Students.')
        ->group(function () {
            Route::get('/', 'list')->name('list');
        });
    Route::controller(ActivityController::class)
        ->prefix('activity')->name('activity.')->group(function () {
            route::get('/', 'list')->name('list');
        });
});
