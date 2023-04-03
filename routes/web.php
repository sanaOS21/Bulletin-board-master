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

// Route::get('/', function () {
//     return view('welcome');
// });

//
Auth::routes();

// ①誰でも入れる（ログアウト中）
// middleware=> ミドルウェアを適用している
Route::group(['middleware' => ['guest']], function () {
    // namespace=> 毎回指定する手間が省ける
    //ログイン画面
    Route::get('/login', '\App\Http\Controllers\Auth\Login\LoginController@login')->name('login');
    Route::post('/login', '\App\Http\Controllers\Auth\Login\LoginController@login');
    // 新規登録画面
    Route::get('/register', '\App\Http\Controllers\Auth\Register\RegisterController@register')->name('register');
    Route::post('/register', '\App\Http\Controllers\Auth\Register\RegisterController@register');
    // 登録完了画面
    Route::get('/added', '\App\Http\Controllers\Auth\Register\RegisterController@added')->name('added');
    Route::post('/added', '\App\Http\Controllers\Auth\Register\RegisterController@added');
});
