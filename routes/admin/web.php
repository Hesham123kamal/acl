<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileAttributeController;

Route::middleware(['auth'])
    ->group(function () {

        Route::name('admin.')->prefix('admin')->group(function () {

            // Start Dashboard Home Routes
            Route::get('/home',[HomeController::class,'index'])->name('home');
            // End Dashboard Home Routes

            // Start Dashboard Roles Routes
            Route::get('/roles',[RoleController::class,'index'])->name('roles.data');;
            Route::resource('roles',RoleController::class);
            // End Dashboard Roles Routes

            // Start Settings Profile Attributes Routes

            Route::get('/settings',[ProfileAttributeController::class,'index'])->name('settings.display');

            Route::get('/settings/edit',[ProfileAttributeController::class,'edit_profile_attributes_settings'])->name('settings.display.edit');

            Route::post('store-settings',[ProfileAttributeController::class,'storeNewProfileAttributes'])->name('settings.store');

            // End Settings Profile Attributes Routes

        });

    });
