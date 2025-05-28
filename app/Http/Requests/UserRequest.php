<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'pass' => 'required | confirmed',
            'pass_confirmation' => 'required',
        ];
    }

    /**
    * 項目名
    *
    * @return array
    */
    public function attributes() {
        return [
            'name' => 'ユーザ名',
            'email' => 'メールアドレス',
            'pass' => 'パスワード',
            'pass_confirmation' => 'パスワード(確認用)',
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'name.required' => ':attributeは必須項目です。',
            'email.required' => ':attributeは必須項目です。',
            'email.email' => ':attributeはメールアドレス形式で入力してください。',
            'email.unique' => ':attributeは既に登録されています。',
            'pass.required' => ':attributeは必須項目です。',
            'pass.confirmed' => ':attributeがパスワード(確認用)と一致していません。',
            'pass_confirmation.required' => ':attributeは必須項目です。',
        ];
    }
}
