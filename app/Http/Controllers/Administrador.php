<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pacientes;  
use Illuminate\Validation\Rule;
// importar modelo oloquent ORM sera utilizado en el controlador 

class Administrador extends Controller
     {
    
   public function admin(){
        // consultas a la base de datos de 2 formas 
       	      // 1 - // constructor de consultas de laravel 
       	      // $alumnos = DB::table('alumnos')->get();  //traer todos los registros de la tabla alumnos

             // 2 - usando el modelo ORM: consultas al modelo, all()traer todos los registros
            $pacientes = Pacientes::orderBy('apellido', 'DESC')->get(); 
            // ordenar pacientes por apellido en forma descendente
            return view('admin/admin' , compact('pacientes')) ;
    // return view('admin/admin') ;
                 //compact se pasan las variables a las vistas 
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


  public function nuevoUsuario (){

       return view('admin/nuevoUsuario') ;
             // vista al formulario para agregar nuevos usuarios 

    }

   public function insertarUsuario (){
                    
                    // insertar nuevos usuarios, metodo validate() para validar datos de los campos del formulario

                    $data = request()->validate([
                      'dni' => ['required','unique:pacientes,dni','max:8'],
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

                    Pacientes::create([
                          'dni' => $data['dni'],
                          'apellido' => $data['apellido'],
                          'nombre' => $data['nombre'],
                          'genero' => $data['genero'],
                          'fecha_nacimiento' => $data['fecha_nacimiento'],
                          'edad' => $data['edad'],
                          'obra_social' => $data['obra_social'],
                          'localidad' => $data['localidad'],
                          'provincia' => $data['provincia'],
                          'fecha_entrada' => $data['fecha_entrada'], 

                     ]);

                     return redirect()->route('admin');

                   // return redirect()->route('rutascreadas');  redireccionar una vez que se insertar datos 

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
               return redirect()->route('admin');


          }





}
