<?php
Route::group([
    'prefix'=>'products',
], function(){
    Route::get('index','backend\AdminProductsController@index')->name('products.index');
    Route::get('create','backend\AdminProductsController@create')->name('products.create');
    Route::post('create','backend\AdminProductsController@insert');
    Route::get('view/{id}','backend\AdminProductsController@view')->name('products.view');
    Route::get('edit/{id}','backend\AdminProductsController@edit')->name('products.edit');
    Route::post('update/{id}','backend\AdminProductsController@update')->name('products.update');
    Route::get('delete/{id}','backend\AdminProductsController@delete')->name('products.delete');
});