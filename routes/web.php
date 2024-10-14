<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('settings')->group(function () {

        Route::get('/departments', function () {
            return view('live/hr/department/index');
        })->name('settings.departments');

        Route::get('/departments/{department}', [
            \App\Http\Controllers\HR\DepartmentController::class, 'show'
        ])->name('settings.departments.show');

        Route::get('/roles', function () {
            return view('live/hr/role/index');
        })->name('settings.roles');

    });
});
