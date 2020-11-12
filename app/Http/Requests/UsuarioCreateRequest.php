<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioCreateRequest extends FormRequest
{


    // Este se crea deacuerdo al nombre del modelo que se tenga y la funcion a la cual se le realizara.. la validacion 
    // en este caso el modelo es ´Salida_vehiculo´ y la funcion create ---  asi que queda  Salida_vehiculoCreateRequest
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;;  // desde inicio impiesa false.. se le coloca true para que funcione
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [

            'nombre' => 'required', 
            'email' => 'required|unique:usuarios|email',

            //   'email' => 'required|email',

        ];
    }

    public function messages()
    {
        return [

            'nombre.required' => 'Debe Incluir el nombre de Usuario.',
            'nombre.unique' => 'El usuario que intenta ingresar ya existe.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.unique' => 'El correo que intenta ingresar ya existe.',

            //'email.email' => 'El correo debe tener un formato correcto',


        ];
    }
    
}
