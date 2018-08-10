<?php
Route::group([
    'prefix'=>'users',
], function(){
    Route::get('index','backend\AdminUsersController@index')->name('users.index');
    Route::get('create','backend\AdminUsersController@create')->name('users.create');
    Route::post('create','backend\AdminUsersController@insert');
    Route::get('view/{id}','backend\AdminUsersController@view')->name('users.view');
    Route::get('edit/{id}','backend\AdminUsersController@edit')->name('users.edit');
    Route::post('update/{id}','backend\AdminUsersController@update')->name('users.update');
    Route::get('delete/{id}','backend\AdminUsersController@delete')->name('users.delete');
});