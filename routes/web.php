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
    return redirect('/login');
    // return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/products');
    // return view('welcome');
})->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/products', 'ProductController@index')->name('products');
});
