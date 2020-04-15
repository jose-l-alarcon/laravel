<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosticoDataRequest extends FormRequest
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
         'detalle_diagnostico' => 'required',
        
        ];
    }

    public function messages(){
        return [
            'detalle_diagnostico.required' => 'Campo obligatorio',
            
          
 
        ];
    }
}
