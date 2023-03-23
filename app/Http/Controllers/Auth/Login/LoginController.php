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
        // $requst->isMethod('post') 引数に指定した文字列とHTTP動詞が同じか判定
        if ($request->isMethod('post')) {

            $date = $request->only('mail', 'password');
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
