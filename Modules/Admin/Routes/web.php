<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', 'AdminController@index')->name('admin');
        Route::get('/bulk_email_upload', 'CRUDController@bulk')->name('bulk_email');
        Route::get('/single_email_upload', 'CRUDController@single')->name('single_email');
        Route::get('/email_scheduler', 'EmailSchedulerController@email_scheduler')->name('email_scheduler');
        Route::get('/add_batch_name', 'CRUDController@add_batch_name')->name('add_batch_name');

        Route::post('upload_excel','CRUDController@uploadExcel')->name('excelUpload');
        Route::post('singleUpload','CRUDController@singleUpload')->name('singleUpload');
        Route::post('add_batches','CRUDController@add_batches')->name('add_batches');

        Route::post('get_update_email','CRUDController@get_update_email')->name('get_update_email');
        Route::post('update_email','CRUDController@update_email')->name('update_email');

        Route::post('delete_email','CRUDController@delete_email')->name('delete_email');

        Route::post('schedule_email_save','EmailSchedulerController@schedule_email_save')->name('schedule_email_save');
    });
});
