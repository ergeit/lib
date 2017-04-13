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

Route::get('lib','Mobile\LibController@Index');
Route::any('/wechat', 'WechatController@serve');
Route::get('lib/show','LibController@index')->middleware('wechat.oauth');
Route::get('lib/detail','LibController@detail')->middleware('wechat.oauth');
