<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    public function rules() {
        
        if ($this->has('regist')){
            return[
                'productname' => 'required',
                'maker' => 'required',
                'price' => 'required|integer',
                'stock' => 'required|integer',
            ];

        }elseif($this->has('renew')){
            return[
                'productname' => 'required',
                'maker' => 'required',
                'price' => 'required|integer',
                'stock' => 'required|integer',
            ];
        }else{
            return[];
        }
    }

    public function attributes() {
        return[
            'productname' => '商品名',
            'maker' => '会社名',
            'price' => '価格',
            'stock' => '在庫数',
        ];
    }

    public function messages() {
        return[
            'productname.required' => ':attributeは必須事項です。',
            'maker.required' => ':attributeは必須事項です。',
            'price.required' => ':attributeは必須事項です。',
            'stock.required' => ':attributeは必須事項です。',
            'price.integer' => ':attributeは半角数字で入力してください。',
            'stock.integer' => ':attributeは半角数字で入力してください。',           
        ];
    }
}
