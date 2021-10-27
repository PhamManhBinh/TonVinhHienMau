<?php
use Illuminate\Http\Request;
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

Route::get('/Index', function (Request $request) {
    if($request->session()->has('username')){
        return view('Index');
    }
    return redirect('/Login');
});

Route::get('/ImportBenhVien',function () {
    return view('ImportBenhVien');
});
Route::post('/ImportBenhVien','App\Http\Controllers\ImportBVController@import');

Route::get('/Login', function (Request $request) {
    if($request->session()->has('username')){
        return redirect('/Index');
    }
    return view('Login');
});
Route::post('/Login','App\Http\Controllers\LoginController@login');

Route::get('/Logout', function (Request $request) {
    if($request->session()->has('username')){
        $request->session()->forget('username');
    }
    return redirect('/Login');
});

Route::post('/QuenMatKhau', 'App\Http\Controllers\ForgotPasswordController@postEmail');
Route::get('/QuenMatKhau', function () {
    return view('QuenMatKhau');
});

Route::get('/DoiMatKhau', function () {
    return view('DoiMatKhau');
});

Route::get('/TaoTaiKhoan', function () {
    return view('TaoTaiKhoan');
});
Route::post('/TaoTaiKhoan', 'App\Http\Controllers\RegisterController@register');

Route::post('/api/ImportBenhVien/Xoa','App\Http\Controllers\ApiKetQuaImportBV@Xoa');
Route::post('/api/ImportBenhVien/Import','App\Http\Controllers\ApiKetQuaImportBV@Import');
Route::post('/ImportBenhVien/ImportAll','App\Http\Controllers\ImportBVController@ImportAll');