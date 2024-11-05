<?php

use App\Http\Controllers\HR\CompanyController;
use App\Http\Controllers\HR\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('settings')->group(function () {

//        Route::get('/company', function () {
//            return view('laravel/hr/company/show');
//        })->name('settings.company');


        Route::get('/company', [
            CompanyController::class, 'show'
        ])->name('settings.company');



        Route::get('/departments', function () {
            return view('laravel/hr/department/index');
        })->name('settings.departments');

        Route::get('/departments/{department}', [
            DepartmentController::class, 'show'
        ])->name('settings.departments.show');

        Route::get('/roles', function () {
            return view('laravel/hr/role/index');
        })->name('settings.roles');

    });
});
