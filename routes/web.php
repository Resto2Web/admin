<?php

use Resto2web\Admin\App\Admin\Controllers\HomePageController;
use Resto2web\Admin\App\Admin\Controllers\SettingsPageController;
use Resto2web\Admin\App\Admin\Controllers\GeneralSettingsPageController;
use Resto2web\Admin\App\Auth\Controllers\AdminAuthController;
use Resto2web\Admin\App\Auth\Controllers\TokenAuthController;
Route::group(['middleware'=> 'web'],function() {
    Route::get('/sso/{sso_token}', [TokenAuthController::class, 'login'])->name('loginWithToken');
});
Route::group(['as'=> 'admin.','prefix' => 'admin','middleware'=> ['web','admin-seo']],function(){
    Route::get('/login', [AdminAuthController::class,'login'])->name('login');
    Route::middleware('admin')->group(function (){
        Route::post('/logout', [AdminAuthController::class,'logout'])->name('logout');

        Route::get('/', HomePageController::class)->name('index');
        Route::get('/settings', [SettingsPageController::class,'index'])->name('settings.index');
        Route::get('/settings/general', [GeneralSettingsPageController::class,'show'])->name('settings.general');
        Route::patch('/settings/general', [GeneralSettingsPageController::class,'update'])->name('settings.general');
    });
});

