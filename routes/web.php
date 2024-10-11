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
    Route::get('/dashboard', function () {return view('dashboard');
    })->name('dashboard');

//    Route::get('/settings/departments', function () {return view('settings/departments');
//    })->name('departments');



    Route::prefix('settings')->group(function () {

        Route::get('/roles',function () {return view('settings/roles');
        })->name('settings.roles');

        Route::get('/departments',function () {return view('settings/departments');
        })->name('settings.departments');

    });
});
