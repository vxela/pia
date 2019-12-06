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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'LoginController@index')->name('login');
Route::post('/', 'LoginController@auth')->name('auth');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/preproduksi/simple', 'PreproduksiController@simpleView');
Route::resource('/preproduksi', 'PreproduksiController');
Route::resource('/produksi', 'ProduksiController');
Route::get('/screen', 'ScreenController@index');

Route::resource('/admin/user', 'UserController');


Route::group(['middleware' => 'auth'], function(){
    Route::resource('/dashboard/gudang', 'GudangController');
    Route::get('/dashboard/dataStock', 'StockController@ajaxGetStock')->name('dataStock');
    Route::resource('/dashboard/stock', 'StockController');
    Route::resource('/dashboard/item', 'ItemController');
    Route::get('/dashboard/item-stock', 'HomeController@itemStock')->name('dashboard.item-stock');
    Route::resource('/dashboard', 'HomeController');

});

