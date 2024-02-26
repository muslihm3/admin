<?php

use Illuminate\Support\Facades\Auth;
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
//     return view('home');
// });

Auth::routes();
// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', 'IndexController@index')->name('index');

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'IndexController@index')->name('index');
Route::get('/masuk', 'MasukController@index')->name('masuk');
Route::get('/keluar', 'KeluarController@index')->name('keluar');

Route::get('/customer', 'CustomerController@index')->name('customer');
Route::get('/pesanan', 'PesananController@index')->name('pesanan');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');
