<?php

use Resto2web\Admin\App\Admin\Controllers\HomePageController;
use Resto2web\Admin\App\Auth\Controllers\AdminAuthController;
use Resto2web\Admin\App\Auth\Controllers\TokenAuthController;
Route::group(['middleware'=> 'web'],function() {
    Route::get('/sso/{sso_token}', [TokenAuthController::class, 'login'])->name('loginWithToken');
});
Route::group(['as'=> 'admin.','prefix' => 'admin','middleware'=> 'web'],function(){
    Route::get('/login', [AdminAuthController::class,'login'])->name('login');
    Route::middleware('admin')->group(function (){
        Route::get('/', HomePageController::class)->name('index');
    });
});

