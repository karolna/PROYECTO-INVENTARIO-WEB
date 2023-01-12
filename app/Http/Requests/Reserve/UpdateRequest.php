<?php

namespace App\Http\Requests\Reserve;

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
            'name'=>'required',
            'lastname'=>'required',
            'dni'=>'string|required|min:10|max:10',
            'phone'=>'string|nullable|min:10|max:10',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Este campo es requerido. Ingrese nuevamente los datos de la reserva',
            'lastname.required'=>'Este campo es requerido. Ingrese nuevamente los datos de la reserva',
            'dni.string'=>'El valor no es correcto. Ingrese nuevamente los datos de la reserva',
            'dni.required'=>'Este campo es requerido. Ingrese nuevamente los datos de la reserva',
            'dni.min'=>'Cédula Invalida. Ingrese nuevamente los datos de la reserva',
            'dni.max'=>'Solo se permite 10 caracteres. Ingrese nuevamente los datos de la reserva',
            'phone.string'=>'El valor no es correcto. Ingrese nuevamente los datos de la reserva',
            'phone.min'=>'El número de telefono esta incompleto. Ingrese nuevamente los datos de la reserva',
            'phone.max'=>'Solo se permite 10 caracteres. Ingrese nuevamente los datos de la reserva',

        ];
    }
}
