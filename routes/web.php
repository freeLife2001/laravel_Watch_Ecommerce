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
Route::get('/', 'HomeController@index')->name('home');
Route::get('tin-tuc', 'HomeController@blog')->name('home.blog');
Route::get('chi-tiet-san-pham/{id}-{slug}.html', 'HomeController@view')->name('home.view');
Route::get('danh-muc-san-pham/{id}-{slug}.html', 'HomeController@productByCategory')->name('home.product_category');


//tìm kiếm
Route::post('tim-kiem', 'HomeController@search')->name('home.search');

//giỏ hàng
Route::get('gio-hang', 'CartController@cart')->name('cart.cart');
Route::post('thanh-toan', 'CartController@createBill')->name('cart.create_bill');
Route::post('cart', 'CartController@create')->name('cart.create');
Route::get('gio-hang/cap-nhat-so-luong/{id}/{total}', 'CartController@update')->name('cart.update_total');
Route::get('xoa-khoi-gio-hang/{id}', 'CartController@delete')->name('cart.delete');

//bài viết
Route::get('chi-tiet-bai-viet/{id}', 'HomeController@postView')->name('post.view');


Auth::routes();



Route::group([
    'middleware' => 'auth',
//    'namespace' => 'admin',
    'prefix' => 'admin',
], function () {
    Route::get('index', 'backend\AdminHomeController@index')->name('admin.index');
    require(__DIR__ . '/backend/users.php');
    require(__DIR__ . '/backend/category.php');
    require(__DIR__ . '/backend/posts.php');
    require(__DIR__ . '/backend/products.php');
    require(__DIR__ . '/backend/bill.php');
    require(__DIR__ . '/backend/report.php');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

