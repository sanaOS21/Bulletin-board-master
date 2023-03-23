<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|max:30|string',
            'email' => 'required|max:100|string|unique:users',
            'password' => 'required|min:8|max:30|string|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'ユーザ名は必須項目です',
            'username.max' => 'ユーザ名は30文字以内で記入してください',
            'email.required' => 'メールアドレスは必須項目です',
            'email.max' => 'メールアドレスは100文字以内で記入してください',
            'email.unique' => 'このメールメールアドレスは登録されています。',
            'password.required' => 'パスワードは必須項目です',
            'password.max' => 'パスワードは30文字以内で記入してください',
            'password.min' => 'パスワードは8文字以内で記入してください',
            'password.confirmed' => '異なるパスワードを入力しました',
        ];
    }
}
