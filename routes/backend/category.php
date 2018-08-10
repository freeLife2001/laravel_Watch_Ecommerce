<?php
Route::group([
    'prefix'=>'category',
], function(){
    Route::get('index','backend\AdminCategoryController@index')->name('category.index');
    Route::get('create','backend\AdminCategoryController@create')->name('category.create');
    Route::post('create','backend\AdminCategoryController@insert');
    Route::get('view/{id}','backend\AdminCategoryController@view')->name('category.view');
    Route::get('edit/{id}','backend\AdminCategoryController@edit')->name('category.edit');
    Route::post('update/{id}','backend\AdminCategoryController@update')->name('category.update');
    Route::get('delete/{id}','backend\AdminCategoryController@delete')->name('category.delete');
});