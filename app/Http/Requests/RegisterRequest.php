<?php

namespace App\Http\Requests;

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
            'fullname' => 'required | min:5',
            'username' => 'required | min:4 | unique:users',
            'email' => 'required | email ',
            'phone' => 'required | regex:/^([0-9]*$)/u | min:10 | max:11 | unique:users',
            'password' => 'required | max: 12 | min:5',
            'repeat-pass'=> 'required | same:password'
        ];
    }
}
