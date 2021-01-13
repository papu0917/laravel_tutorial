<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ShopController@index');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/mycart', 'ShopController@myCart')->middleware('auth');
    Route::post('/mycart', 'ShopController@addMycart');
    Route::post('/cartdelete', 'ShopController@deleteCart');
    Route::post('/checkout', 'ShopController@checkout');
});
Route::get('admin', 'AdminController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// 決済ボタンを表示するページ
Route::get('/index', 'PaymentsController@index')->name('index');

// Stripeの処理
Route::post('/payment', 'PaymentsController@payment')->name('payment');

// 決済完了ページ
Route::get('/complete', 'PaymentsController@complete')->name('complete');
