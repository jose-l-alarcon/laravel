<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteDataRequest extends FormRequest
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

          'dni' => ['required','max:8'],
          'apellido' => 'required',
          'nombre' =>'required',
          'genero' => 'required',
          'fecha_nacimiento' => 'required',
           'edad' => 'required',
          'obra_social' =>['required','max:15'],
          'localidad' => 'required',
          'provincia' => 'required',
          'hcnum' =>'required',

            //
        ];
    }

     public function messages(){

        return [
            'dni.required' => 'Campo obligatorio',
            'dni.max' => 'El campo dni tiene un máximo de 8',
            'apellido.required' => 'Campo obligatorio',
            'nombre.required' => 'Campo obligatorio',
            'genero.required' => 'Campo obligatorio',
            'obra_social.required' => 'Campo obligatorio',
            'fecha_nacimiento.required' => 'Campo obligatorio',
            'edad.required' => 'Campo obligatorio',
            'localidad.required' => 'Campo obligatorio',
             'provincia.required' => 'Campo obligatorio',
            'hcnum.required' => 'Campo obligatorio',
            
           
 
        ];
    }
}
