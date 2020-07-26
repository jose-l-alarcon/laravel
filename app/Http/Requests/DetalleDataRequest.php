<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleDataRequest extends FormRequest
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
            'detalle_diagnostico.required' => 'Error , intenta enviar un campo vacio',
           
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
