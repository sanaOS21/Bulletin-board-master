<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //ログイン
    public function login(Request $request)
    {
        // $request->isMethod('post') 引数に指定した文字列とHTTP動詞が同じか判定
        if ($request->isMethod('post')) {
            // 受け取りたいものを受け取る(only) ※受け取りたくないときexcept

            $date = $request->only('email', 'password');
            // $dateを受け取りDBからユーザを見つけるために使用
            if (Auth::attempt($date)) {
                return redirect('/top');
            }
        }
        return view('/login');
    }
    public function logout()
    {
        Auth::logout();
        return view('/login');
    }
}
