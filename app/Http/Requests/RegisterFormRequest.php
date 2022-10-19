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

public function getValidatorInstance()
{
    $old_year = $this->input('old_year');
    $old_month = $this->input('old_month');
    $old_day = $this->input('old_day');
    $data = $old_year . '-' . $old_month . '-' . $old_day;

    $this->merge([
        'data' => $data,
    ]);
    return parent::getValidatorInstance();
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
            'sex' => 'required','in:1,2,3',
            'old_year' => 'required',
            'old_month' => 'required',
            'old_day' => 'required',
            'data' => 'date|before:today|after:1999-12-31',
            'role' => 'required','in:1,2,3,4',
            'password' => 'required|string|min:8|max:30|confirmed',
            // 'password_confirmation' => 'required|string|min:8|max:30'
        ];
    }

    public function messages()
    {
        return [
            'over_name.required' => '入力必須',
            'mail.required' => '入力必須',
            'password.required' => '入力必須',
            'password.confirmed' => 'パスワードが一致しません',
            'password.min' => '4文字以上入力してください',
            'data.date' => '正しい日付を入力してください',
            'data.before' => '2000年以降を選択してください',
            'data.after' => '2000年以降を選択してください',


        ];
    }
}
