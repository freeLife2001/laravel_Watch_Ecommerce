<?php
Route::group([
    'prefix'=>'report',
], function(){
    Route::get('/','backend\AdminReportController@index')->name('report.index');
    Route::post('search','backend\AdminReportController@search')->name('report.search');

    Route::get('sold','backend\AdminReportController@sold')->name('report.sold');
    Route::post('sold','backend\AdminReportController@soldSearch')->name('report.sold_search');
});