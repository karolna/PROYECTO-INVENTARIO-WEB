<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email'=>'nullable|unique:users',
        ];
    }
    public function messages()
    {
        return[


            'email.unique'=>'La dirección de correo electrónico ya se encuentra registrada.',
            'email.email'=>'No es un correo electrónico.',

        ];
    }
}
