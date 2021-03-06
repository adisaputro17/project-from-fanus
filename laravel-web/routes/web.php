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


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('logout','LoginController@logout')->name('logout');
});

Route::get('login','LoginController@loginpage')->name('login');
Route::get('register','LoginController@registerpage')->name('register');
Route::post('register','LoginController@prosesregister')->name('prosesregister');
Route::post('login','LoginController@proseslogin')->name('proseslogin');