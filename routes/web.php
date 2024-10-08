<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxCrudController;

Route::controller(AjaxCrudController::class)->group(function(){
    Route::get('/','index')->name('user.index');
    Route::post('/store','store')->name('user.store');
    Route::patch('/update/{uuid}','update')->name('user.update');
    Route::delete('/delete/{uuid}','destroy')->name('user.delete');

    //index data
    Route::get('/ajax-data','ajaxData')->name('ajax.data');
});
