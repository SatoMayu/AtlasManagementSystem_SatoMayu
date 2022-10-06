<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCategoryFormRequest extends FormRequest
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
            'main_category' => 'required|string|max:100'
        ];
    }

    public function messages()
    {
        return [
            'main_category.required' => '入力必須',
            'main_category.string' => '文字列で入力してください'
        ];
    }
}
