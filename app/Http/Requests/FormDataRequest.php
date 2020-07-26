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
          'nrohabitacion' => 'required',
         
         
            
        ];
    }

     public function messages(){
        return [
            
            'fecha_entrada.required' => 'Campo obligatorio',
            'nrohabitacion.required' => 'Campo obligatorio',
          
           
           
           
 
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
