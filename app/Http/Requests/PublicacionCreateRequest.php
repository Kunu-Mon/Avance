<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;



class PublicacionCreateRequest extends FormRequest
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
//    public function rules()
  /*  {
        
            return [

            'usuarios_id'=> 'required',
            'titulo' => 'required',
            'cuerpo' => 'required',


            ];
       
        
    }
*/
  //  public function messages(){
    /**    return [

            'titulo.required' => 'Debe haber un titulo en la Publicacion',
            'cuerpo.required' => 'Debe haber un cuerpo para la publicacion',
            'usuarios_id.required' => 'El Usuario no ha sido selecionado',
            

        ];
    } 
*/

public function rules()
    {
        return[
            'usuarios_id'=> 'required',
            'titulo' => 'required',
            'cuerpo' => 'required',  
        ];
    }

public function messages(){
   return [

            'titulo.required' => 'Debe haber un titulo en la Publicacion',
            'cuerpo.required' => 'Debe haber un cuerpo para la publicacion',
            'usuarios_id.required' => 'El Usuario no ha sido selecionado',
            

        ];
    }









    } 






