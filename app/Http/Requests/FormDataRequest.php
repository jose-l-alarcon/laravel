<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormDataRequest extends FormRequest
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

    // protected $redirect = "diagnosticos/nuevoDiagnostico";

    public function rules()
    {
        return [


          'fecha_entrada' => 'required',
          'nrohistoria_clinica' => 'required',
          'nrohabitacion' => 'required',
          'nrocama' =>'required',
          'bipap' => 'required', 
          'traqueostomia' =>'required',
          'SNG' => 'required',
          'sonda_vesical' => 'required', 
          'signo_vital_peso' =>'required',
          'signo_vital_FC' => 'required',
          'signo_vital_FR' => 'required', 
          'signo_vital_Sat' =>'required',
          'signo_vital_temperatura' =>'required',
          'aporte_oral' => 'required', 
          'examen_fisico' =>'required',
          'examen_complementario' =>'required',
          'cultivo' =>'required',
          'comentarios' =>'required',
          'aspecto_social' =>'required',
            
        ];
    }

     public function messages(){
        return [
            'fecha_entrada.required' => 'Campo obligatorio',
            'nrohistoria_clinica.required' => 'Campo obligatorio',
            'nrohabitacion.required' => 'Campo obligatorio',
            'nrocama.required' => 'Campo obligatorio',
            'bipap.required' => 'Campo obligatorio',
            'traqueostomia.required' => 'Campo obligatorio',
            'SNG.required' => 'Campo obligatorio',
            'sonda_vesical' => 'Campo obligatorio', 
            'signo_vital_peso.required' => 'Campo obligatorio',
            'signo_vital_FC.required' => 'Campo obligatorio',
            'signo_vital_FR.required' => 'Campo obligatorio',
            'signo_vital_Sat.required' => 'Campo obligatorio',
            'signo_vital_temperatura.required' => 'Campo obligatorio',
            'aporte_oral.required' => 'Campo obligatorio',
            'examen_fisico.required' => 'Campo obligatorio',
            'examen_complementario.required' => 'Campo obligatorio',
            'cultivo.required' => 'Campo obligatorio', 
            'comentarios.required' => 'Campo obligatorio',
            'aspecto_social.required' => 'Campo obligatorio',    

           
 
        ];
    }

     public function response(array $errors){
        if ($this->ajax()){
            return response()->json($errors, 200);
        }
        else
        {
        return redirect($this->redirect)
                ->withErrors($errors, 'formulario')
                ->withInput();
        }
    }
}
