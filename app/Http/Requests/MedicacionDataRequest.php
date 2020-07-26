<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicacionDataRequest extends FormRequest
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

          'medicacion' => 'required',
         
            //
        ];
    }

    public function messages(){
        return [
            'medicacion.required' => 'Error campo medicación no puede ser vacio',
          
 
        ];
    }
}
