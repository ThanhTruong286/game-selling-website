<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email'=>['required','email'],//chinh dinh dang yeu cau email
            'password'=>['required'],
        ];
    }
    public function messages():array{
        return[
            'email.required'=>'Mày chưa nhập email kìa !!!',
            'email.email'=>'Mày nhập email chưa đúng định dạng kìa !!!',
            'password.required'=>'Mày chưa nhập password kìa !!!'
        ];
    }
}
