<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Users\User;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    // バリデーション作成
    public function validator(array $data)
    {
        // Validatar::make('値の配列','検証ルールの配列');
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
    }

    public function create(Request $request)
    {
        // ↓リクエストメソッドが指定のものか確認【佐藤追記】
        // dd($request);
        if ($request->isMethod('post')) {
            //     //dataメソッドを追加
            $data = $request->input();
            // dd($data);
            $validator = $this->Validator($request->all());

            // // dd($validator);
            //ifでバリデーションの失敗を判定
            // withInputでold()で入力された値を保存
            // withErrorsで$errorsへエラーメッセージを保存
            // redirectで/registerにリダイレクト　という流れ
            if ($validator->fails()) {
                return redirect('/register')
                    ->withErrors($validator)
                    ->withInput();
            }
            //createメソッドを実行
            // ここがおかしい
            $this->create($data);
            $request->session()->put('username', $data['username']);
            // ↓ Controllerでwithで名前が出るように指示
            return redirect('added');
            // ->with('UserName', $data['username']);
        }
        return view('register');
    }
    // ↓多分、if以外は新規登録画面に戻れ【佐藤追記】

    public function added(Request $request)
    {
        return view('added');
    }
}
