<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConvertController;
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
Route::group(['middleware' =>'guest'], function() {
    Route::get('/', function () {return view('guest.landingPage');});
    Route::get('/guest/login', 'App\Http\Controllers\Guest\AuthController@login')->name('guest.login');
    Route::get('/guest/register', 'App\Http\Controllers\Guest\RegisterController@index');
    Route::post('/guest/register', 'App\Http\Controllers\Guest\RegisterController@store');
    Route::get('/guest/forgotpass', function () {return view('guest.forgotpass');});
    Route::post('/', 'App\Http\Controllers\Guest\AuthController@dologin');
    Route::get('/guest/home', function () {return view('guest.landingPage');});
    Route::get('/guest/uploadDocs', function () {return view('guest.upload');});
    Route::post('/guest/post', 'App\Http\Controllers\Guest\UploadController@store');
    Route::get('/guest/documents', 'App\Http\Controllers\Guest\UploadController@printSetting');
    Route::post('/guest/printOption', 'App\Http\Controllers\Guest\uploadController@printSetting');
    Route::post('/guest/totalPage', 'App\Http\Controllers\Guest\PaymentController@totalPage');
    Route::get('/guest/payment', 'App\Http\Controllers\Guest\PaymentController@payment');
    Route::get('/guest/email', 'App\Http\Controllers\Guest\UploadController@email');
    Route::get('/guest/payment/success', 'App\Http\Controllers\Guest\FinishController@success');
    Route::get('/guest/payment/pending', 'App\Http\Controllers\Guest\FinishController@pending');
    Route::get('/guest/payment/failed', 'App\Http\Controllers\Guest\FinishController@failed');
});

// untuk admin, tenaga teknis dan client
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::post('/logout', 'App\Http\Controllers\Guest\AuthController@logout');
    Route::get('/redirect', 'App\Http\Controllers\Guest\RedirectController@cek');
});

// untuk client
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/home', 'App\Http\Controllers\User\MainController@main');
    Route::get('/user/home', 'App\Http\Controllers\User\MainController@index');
    Route::get('/user/landingpage', 'App\Http\Controllers\User\MainController@index');
    Route::get('/user/uploadDocs', function () {return view('user.upload');});
    Route::post('/user/post', 'App\Http\Controllers\User\UploadController@store');
    Route::get('/user/documents', 'App\Http\Controllers\User\UploadController@printSetting');
    Route::post('/user/printOption', 'App\Http\Controllers\User\uploadController@printSetting');
    Route::post('/user/totalPage', 'App\Http\Controllers\User\PaymentController@totalPage');
    Route::get('/user/payment', 'App\Http\Controllers\User\PaymentController@payment');
    // success payment
    Route::get('/user/email', 'App\Http\Controllers\User\UploadController@email');
    Route::get('/user/payment/success', 'App\Http\Controllers\User\FinishController@success');
    // pending payment
    Route::get('/user/payment/pending', 'App\Http\Controllers\User\FinishController@pending');
    // failed payment
    Route::get('/user/payment/failed', 'App\Http\Controllers\User\FinishController@failed');
    //history
    Route::get('/user/history', 'App\Http\Controllers\User\FinishController@history');
});
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/home', 'App\Http\Controllers\Admin\MainController@main');
    Route::get('/admin/index', 'App\Http\Controllers\Admin\MainController@index');
    //user
    Route::get('admin/user', 'App\Http\Controllers\Admin\UserController@index' );
    Route::get('admin/user/create', 'App\Http\Controllers\Admin\UserController@create' );
    Route::post('admin/user/create/post', 'App\Http\Controllers\Admin\UserController@store' );
    Route::get('admin/user/{id}', 'App\Http\Controllers\Admin\UserController@edit');
    Route::put('admin/user/{id}', 'App\Http\Controllers\Admin\UserController@update');
    Route::delete('admin/user/{id}', 'App\Http\Controllers\Admin\UserController@destroy');
    //transaksi
    Route::get('admin/transaksi', 'App\Http\Controllers\Admin\TransaksiController@index' );
    Route::delete('admin/transaksi/{id}', 'App\Http\Controllers\Admin\TransaksiController@destroy');
    //
    Route::get('admin/data', 'App\Http\Controllers\Admin\DataController@index' );
    Route::get('admin/data/{id}', 'App\Http\Controllers\Admin\DataController@edit');
    Route::put('admin/data/{id}', 'App\Http\Controllers\Admin\DataController@update');
    Route::delete('admin/data/{id}', 'App\Http\Controllers\Admin\DataController@destroy');
});