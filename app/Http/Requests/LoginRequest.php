<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request) {
        return [
            'pass' => 'required',
            'email' => [
                'required',
                'email',
                Rule::exists('users')->where(function($query)use ($request){
                    $query->where('password',$request->pass);
                }),
            ],
        ];
    }

    /**
     * 項目名
     *
     * @return array
     */
    public function attributes() {
        return [
            'pass' => 'パスワード',
            'email' => 'メールアドレス',
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'pass.required' => ':attributeは必須項目です。',
            'pass.exists' => ':attributeは間違っています。',
            'email.required' => ':attributeは必須項目です。',
            'email.email' => 'メールアドレスを入力してください。',
            'email.exists' => ':attributeは間違っています。',
        ];
    }
}
