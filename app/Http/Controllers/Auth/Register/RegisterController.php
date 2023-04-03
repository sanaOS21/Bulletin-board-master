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
    use RegistersUsers;

    protected $redirectTo = '/login';

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

    public function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }

    public function register(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->input();

            $validator = $this->validator($data);

            if ($validator->fails()) {
                return redirect('/register')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $this->create($data);

                return redirect('added')->with('username', $data['username']);
            }
            //usernameデータも一緒にaddedを表示
        }
        return view('register');
    }
    public function added(Request $request)
    {
        return view('added');
    }
}
