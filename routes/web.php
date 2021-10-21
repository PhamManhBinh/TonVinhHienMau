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

Route::get('/ImportBenhVien',function () {
    return view('ImportBenhVien');
});
Route::post('/ImportBenhVien','App\Http\Controllers\ImportBVController@import');

Route::get('/Login', function () {
    return view('Login');
});

Route::get('/QuenMatKhau', function () {
    return view('QuenMatKhau');
});

Route::get('/DoiMatKhau', function () {
    return view('DoiMatKhau');
});

Route::get('/TaoTaiKhoan', function () {
    return view('TaoTaiKhoan');
});
