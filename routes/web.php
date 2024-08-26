<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxCrudController;

Route::controller(AjaxCrudController::class)->group(function(){
    Route::get('/','index')->name('user.index');
    Route::post('/store','store')->name('user.store');
});
