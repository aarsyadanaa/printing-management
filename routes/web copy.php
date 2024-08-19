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

//  jika client belum login
Route::group(['middleware' =>'guest'], function() {
    Route::get('/', function () {return view('landingPage');});
    Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
    Route::get('/register', 'App\Http\Controllers\RegisterController@index');
    Route::post('/register', 'App\Http\Controllers\RegisterController@store');
    Route::get('/forgotpass', function () {return view('forgotpass');});
    Route::post('/', 'App\Http\Controllers\AuthController@dologin');
    //
    Route::get('/uploadDocGuest', function () {return view('upload');});
    Route::get('/uploadDocUser', function () {return view('upload');});
    Route::post('/post', 'App\Http\Controllers\UploadController@store')->middleware('guest');
    Route::get('/documents', 'App\Http\Controllers\UploadController@printSetting')->middleware('guest');
    Route::post('/printOption', 'App\Http\Controllers\uploadController@printSetting');
    Route::post('/totalPage', 'App\Http\Controllers\PaymentController@totalPage');
    Route::get('/payment', 'App\Http\Controllers\PaymentController@payment');
    // success payment
    Route::get('/email', 'App\Http\Controllers\UploadController@email');
    Route::get('/successPayment', 'App\Http\Controllers\FinishController@success');
    // pending payment
    Route::get('/payment/pending', 'App\Http\Controllers\FinishController@pending');
    // failed payment
    Route::get('/payment/failed', 'App\Http\Controllers\FinishController@failed');
});

// untuk admin, tenaga teknis dan client
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
    Route::get('/redirect', 'App\Http\Controllers\RedirectController@cek');
});

// untuk client
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/home', function () {
        return view('landingPage');
    });
    // Route::get('/uploadDocUser', function () {return view('upload');});
    // Route::post('/post', 'App\Http\Controllers\UploadController@store');
    // Route::get('/documents', 'App\Http\Controllers\UploadController@printSetting');
    // Route::post('/printOption', 'App\Http\Controllers\uploadController@printSetting');
    // Route::post('/totalPage', 'App\Http\Controllers\PaymentController@totalPage');
    // Route::get('/payment', 'App\Http\Controllers\PaymentController@payment');
    // // success payment
    // Route::get('/email', 'App\Http\Controllers\UploadController@email');
    // Route::get('/successPayment', 'App\Http\Controllers\FinishController@success');
    // // pending payment
    // Route::get('/payment/pending', 'App\Http\Controllers\FinishController@pending');
    // // failed payment
    // Route::get('/payment/failed', 'App\Http\Controllers\FinishController@failed');
});