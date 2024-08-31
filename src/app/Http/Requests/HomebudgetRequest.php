<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomebudgetRequest extends FormRequest
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
            'date' => 'required|date',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付は必須です。',
            'date.date' => '日付は正しい形式で入力してください。',
            'category.required' => 'カテゴリは必須です。',
            'category.exists' => 'カテゴリは存在しません。',
            'price.required' => '金額は必須です。',
            'price.numeric' => '金額は数値で入力してください。',
            'price.min' => '金額は0以上で入力してください。',
        ];
    }
}
