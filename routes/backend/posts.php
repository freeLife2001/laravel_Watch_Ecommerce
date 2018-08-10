<?php
Route::group([
    'prefix'=>'posts',
], function(){
    Route::get('index','backend\AdminPostsController@index')->name('posts.index');
    Route::get('create','backend\AdminPostsController@create')->name('posts.create');
    Route::post('create','backend\AdminPostsController@insert');
    Route::get('view/{id}','backend\AdminPostsController@view')->name('posts.view');
    Route::get('edit/{id}','backend\AdminPostsController@edit')->name('posts.edit');
    Route::post('update/{id}','backend\AdminPostsController@update')->name('posts.update');
    Route::get('delete/{id}','backend\AdminPostsController@delete')->name('posts.delete');
});