<?php
Route::group([
    'prefix'=>'bill',
], function(){
    Route::get('index','backend\AdminBillController@index')->name('bill.index');
    Route::get('create','backend\AdminBillController@create')->name('bill.create');
    Route::post('create','backend\AdminBillController@insert');
    Route::get('view/{id}','backend\AdminBillController@view')->name('bill.view');
    Route::get('edit/{id}','backend\AdminBillController@edit')->name('bill.edit');
    Route::post('update/{id}','backend\AdminBillController@update')->name('bill.update');
    Route::get('delete/{id}','backend\AdminBillController@delete')->name('bill.delete');
});