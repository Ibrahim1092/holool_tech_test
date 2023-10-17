<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','App\Http\Controllers\LoginController@index')->name('index');
Route::post('/register','App\Http\Controllers\RegistrationController@register')->name('register');
Route::post('/login','App\Http\Controllers\LoginController@login')->name('login');
Route::get('/logout','App\Http\Controllers\LoginController@logout')->name('logout');
//Products
Route::group(['middleware' => ["trusted"]], function () {
    Route::get('/product/show','App\Http\Controllers\ProductController@index')->name('product/show');
    Route::get('/product/create','App\Http\Controllers\ProductController@create')->name('product/create');
    Route::post('/product/store','App\Http\Controllers\ProductController@store')->name('product/store');
    Route::get('edit/{id}','App\Http\Controllers\ProductController@edit')->name('product/edit');
    Route::post('update/{id}','App\Http\Controllers\ProductController@update')->name('product/update');
    Route::get('delete/{id}','App\Http\Controllers\ProductController@destroy')->name('product/delete');
});
//User
Route::get('/home','App\Http\Controllers\ProductController@show')->name('/home');
Route::group(['middleware' => ["isUser"]], function () {
    Route::get('addtocart/{id}','App\Http\Controllers\CartController@store')->name('/addtocart');
    Route::get('/showcart','App\Http\Controllers\CartController@show')->name('/showcart');
    Route::get('updatecart/{id}','App\Http\Controllers\CartController@update')->name('/updatecart');
    Route::get('deleteitem/{id}','App\Http\Controllers\CartController@destroy')->name('/deleteitem');
    Route::post('/storeorder/{alltotal}','App\Http\Controllers\CartController@storeorder')->name('/storeorder');
});
//Admin
Route::group(['middleware' => ["isAdmin"]], function () {
    Route::get('/admin','App\Http\Controllers\CartController@showorder')->name('/admin');
    Route::get('order/{id}','App\Http\Controllers\CartController@orderdetails')->name('/admin/orderdetails');
});


