<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
   public function authorize()
   {
    return true;
   }
   public function rules()
   {
    return [
        'email' => 'required',
        'password' => 'required'
     ];
    }
    public function messages()
    {
        return [
            'email.required' => 'email harus di isi',
            'password' => 'password harus di isi juga'
        ];
    }

}
