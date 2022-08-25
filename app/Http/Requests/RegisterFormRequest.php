<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|regex:/\A[ァ-ヴー]+\z/u|max:30',
            'under_name_kana' => 'required|string|regex:/\A[ァ-ヴー]+\z/u|max:30',
            'mail_address' => 'required|string|email|max:100|unique:users',
            'sex' => 'required',
            'old_year' => 'required|after:2000-01-01',
            'old_monty' => 'required',
            'old_day' => 'required',
            'role' => 'required',
            'password' => 'required|string|min:8|max:30|confirmed',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'over_name.required' => '入力必須',
    //         'mail.required' => '入力必須',
    //         'password.required' => '入力必須',
    //         'password.min' => '4文字以上入力してください'
    //     ];
    // }
}
