<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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

            'email'=>'required|nullable|unique:users',

                ];
    }
    public function messages()
    {
        return[
            'email.required'=>'El campo Correo electronico es requerido.',
            'email.unique'=>'La dirección de correo electrónico ya se encuentra registrada.',

        ];
    }
}
