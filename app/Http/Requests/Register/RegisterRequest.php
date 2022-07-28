<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|unique:accounts|max:20|min:1',
            'email' => 'required|email|unique:accounts',
            'password' => 'required|min:3|max:20',
            're-password' => 'required|same:password',
            'phone' => 'required|unique:accounts|numeric|digits:10',
            'gender' => 'required',
            'address' => 'required|max:250',
        ];
    }
}
