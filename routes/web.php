<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\StudentController;
use App\Models\Reward;
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
        ->name('students.')
        ->group(function () {
            Route::get('', 'list')->name('list');
            Route::get('/create', 'showCreateForm')->name('create-form');
            Route::post('/create', 'create')->name('create');
            Route::prefix('/{student_code}')
                ->group(function () {
                    Route::get('', 'show')->name('view');
                    Route::get('/update', 'showUpdateForm')->name('update-form');
                    Route::post('/update', 'update')->name('update');
                });
            //end of student code prefix
        });
    //end of student controller

    Route::controller(ActivityController::class)
    ->prefix('activities')
    ->name('activities.')
    ->group(function () {
        Route::get('', 'list')->name('list');
        Route::get('/create', 'showCreateForm')->name('create-form');
        Route::post('/create', 'create')->name('create');
        Route::prefix('/{activity_name}')
            ->group(function () {
                Route::get('', 'show')->name('view');
                Route::get('/update', 'showUpdateForm')->name('update-form');
                Route::post('/update', 'update')->name('update');
                Route::prefix('/students')->group(function () {
                    Route::get('', 'showStudents')->name('view-students');
                });
            });
            
    });

    Route::controller(RewardController::class)
        ->prefix('rewards')
        ->name('rewards.')
        ->group(function () {
            Route::get('', 'list')->name('list');
            Route::get('/create', 'showCreateForm')->name('create-form');
            Route::post('/create', 'create')->name('create');
            Route::prefix('/{reward_code}')
                ->group(function () {
                    Route::get('', 'show')->name('view');
                    Route::get('/update', 'showUpdateForm')->name('update-form');
                    Route::post('/update', 'update')->name('update');
                });
        });
});
