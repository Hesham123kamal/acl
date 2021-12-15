<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
//use App\Http\Controllers\Admin\RoleController;

Route::middleware(['auth'])
    ->group(function () {

        Route::name('admin.')->prefix('admin')->group(function () {

            // Start Dashboard Home Routes
            Route::get('/home',[HomeController::class,'index'])->name('home');
            // End Dashboard Home Routes

            // Start Dashboard Roles Routes
            Route::get('/roles',[RoleController::class,'index'])->name('roles.data');;
//            Route::delete('/roles/bulk_delete',[RoleController::class,'bulkDelete'])->name('roles.bulk_delete');
            Route::resource('roles',RoleController::class);
            // End Dashboard Roles Routes

        });

    });
