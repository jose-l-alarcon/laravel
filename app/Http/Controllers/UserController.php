<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;  

class UserController extends Controller
{
    
    public function index(){

    

     // opcion 3 para pasar variables a una vista 
    	return view('prueba') ;
    }

    public function detalle_paciente ($idpaciente){

          	$paciente = Pacientes::find($idpaciente);
            //Pacientes == use App\Models\Pacientes; 
            // traer paciente con el mismo idpaciente

            if ($paciente == null) {
              // en el caso del idpaciente sea incorrecto = error 404 
             // return view('error404/error');
              return response()->view('error404/error',[],404);
            }
             
             // direccionar a vista con los detallles del alumno
          	 return view('admin/detalle' , compact('paciente')) ;

          }

        public function editarPaciente (Pacientes $paciente){
     // cargar formulario para editar datos del paciente 
             
             // $paciente = Pacientes::find($paciente->$idpaciente);
           
             return view('admin/editarPaciente' , ['paciente' => $paciente]) ;


          }

       public function updatePaciente (Pacientes $paciente){
          
            // dd('actualizado');

            $data = request()->validate([
                    
                      'dni' => ['required',Rule::unique('pacientes')->ignore($paciente),'max:8'],
                      // Ignorar el id al actualizar los datos ,En lugar de pasar el valor de la clave del modelo al ignoremétodo, puede pasar toda la instancia del modelo. Laravel extraerá automáticamente la clave del modelo: 
                      // Rule::unique('users')->ignore($user)
                          // nombre de la tabla y la instacia completa laravel automaticamente tomara el id

                      'apellido' => 'required',
                      'nombre' =>'required',
                      'genero' => 'required',
                      'fecha_nacimiento' => 'required',
                      'edad' => 'required',
                      'obra_social' =>['required','max:15'],
                      'localidad' => 'required',
                      'provincia' =>'required',
                      'fecha_entrada' => 'required',

                    ]); 
               // campos que seran validados y actualizados 
            // actualizar datos del paciente una vez que pasan las validaciones

              $paciente->update($data);

              // redireccionar a la vista admin
               return redirect()->route('Admin');


          }




}
