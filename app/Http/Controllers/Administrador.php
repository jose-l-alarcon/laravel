<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//clase request validar formularios
use App\FormData;
use App\Http\Requests\FormDataRequest;
use App\Http\Requests\DetalleDataRequest;
use App\Http\Requests\MedicacionDataRequest;
use App\Http\Requests\DiagnosticoDataRequest;
use App\Http\Requests\PacienteDataRequest;

//clase request validar formularios

use Illuminate\Support\Facades\DB;
//MODELOS  importar modelo oloquent ORM sera utilizado en el controlador 
use App\Models\Pacientes;  
use App\Models\Diagnostico;  
use App\Models\Detallediagnostico;  
use App\Models\Comentarios; 
use App\Models\Medicacion;   
//MODELOS

//FECHA 
use Carbon\Carbon;
//FECHA 

///////////////////////////
use Illuminate\Validation\Rule;

//GENERAR PDF
 use Barryvdh\DomPDF\Facade as PDF;
 //GENERAR PDF

class Administrador extends Controller
     {
    
   public function admin(){

          return view('admin/admin') ;
   
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

            $pacientes = Pacientes::all(); 
            // ordenar pacientes por apellido en forma descendente
      

       return view('admin/nuevoUsuario', compact('pacientes')) ;
             // vista al formulario para agregar nuevos usuarios 

    }

   public function insertarUsuario (PacienteDataRequest $request){

                    // $fecha_nacimiento = $request->get('fecha_nacimiento'
                  
                     DB::beginTransaction();
                     try {
          
                     $paciente= new Pacientes;
                     $paciente->dni=$request->get('dni');
                     $paciente->apellido=$request->get('apellido');
                     $paciente->nombre=$request->get('nombre');
                     $paciente->genero=$request->get('genero');
                     $paciente->fecha_nacimiento=$request->get('fecha_nacimiento');
                     $paciente->edad=$request->get('edad');
                     $paciente->obra_social= $request->get('obra_social');
                     $paciente->localidad= $request->get('localidad');
                     $paciente->provincia=$request->get('provincia');
                     $paciente->save();
                       
                       DB::commit();
                          return redirect()->route('Admin')->with('ingreso','El registro se agrego correctamente');
                      } 
                      catch (\Exception $e) {
                    DB::rollback();
                       } 
                    
                   
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
                      // 'fecha_entrada' => 'required',

                    ]); 
               // campos que seran validados y actualizados 
            // actualizar datos del paciente una vez que pasan las validaciones

              $paciente->update($data);

              // redireccionar a la vista admin
               return redirect()->route('Admin')->with('actualizado','El registro se actualizo correctamente');


          }



     public function diagnostico(){

         $diagnostico = DB::table('diagnostico')
            ->join('pacientes', 'diagnostico.idpaciente', '=', 'pacientes.idpaciente')
            ->select('diagnostico.*', 'pacientes.*')
            ->orderBy('apellido', 'asc')
            ->paginate(5);
      
            // ordenar pacientes por apellido en forma descendente
            return view('diagnosticos/diagnostico' , compact('diagnostico')) ;
 
      }


   
   public function nuevoDiagnostico ($idpaciente){

            $paciente = Pacientes::find($idpaciente);
            //Pacientes == use App\Models\Pacientes; 
            // traer paciente con el mismo idpaciente


            $diagnostico = Diagnostico::where("idpaciente","=",$idpaciente)->get();

            // dd($diagnostico);
            
            $date = Carbon::now();

            if ($paciente == null) {
              // en el caso del idpaciente sea incorrecto = error 404 
             // return view('error404/error');
              return response()->view('error404/error',[],404);
            }
             
             // direccionar a vista con los detallles del alumno
             return view('diagnosticos/nuevoDiagnostico' ,['paciente'=>$paciente, 
                    'diagnostico'=>$diagnostico, 'date'=>$date
                    ]);

          }


          public function createDiagnostico (FormDataRequest $request,Pacientes $paciente){
          // Parametro FormDataRequest validar campos del formulario
            // utlizar transaction para guardar datos en tablas diagnostico y Detallediagnostico al mismo tiempo 
         // se recibe como parametro las validaciones del formulario y el id del paciente
                      
                      // calcular la diferencia de dias entre la fecha de ingreso y 
                      // la fecha de evolucion
                      $dia_adicional = 1;
                      $date = Carbon::now();
                      $fecha_ingreso=Carbon::parse($request->get('fecha_entrada'));
                      $dias_internacion=  $dia_adicional + $fecha_ingreso->diffInDays($date);
                   
 
                     DB::beginTransaction();
                     try {
          
                     $diagnostico= new Diagnostico;
                     $diagnostico->idpaciente=$paciente->idpaciente;
                     $diagnostico->nrohabitacion=$request->get('nrohabitacion');
                     $diagnostico->nrocama=$request->get('nrocama');
                     $diagnostico->nrohistoria_clinica=$request->get('nrohistoria_clinica');
                     $diagnostico->fecha_entrada=$fecha_ingreso;
                     $diagnostico->fecha_evolucion= $date;
                     $diagnostico->dias_internacion= $dias_internacion;
                     $diagnostico->bipap=$request->get('bipap');
                     $diagnostico->traqueostomia=$request->get('traqueostomia');
                     $diagnostico->SNG=$request->get('SNG');
                     $diagnostico->sonda_vesical=$request->get('sonda_vesical');
                     $diagnostico->signo_vital_peso=$request->get('signo_vital_peso');
                     $diagnostico->signo_vital_FC=$request->get('signo_vital_FC');
                     $diagnostico->signo_vital_FR=$request->get('signo_vital_FR');
                     $diagnostico->signo_vital_Sat=$request->get('signo_vital_Sat');
                     $diagnostico->signo_vital_temperatura=$request->get('signo_vital_temperatura');
                     $diagnostico->aporte_oral=$request->get('aporte_oral');
                     $diagnostico->examen_fisico=$request->get('examen_fisico');
                    $diagnostico->examen_complementario=$request->get('examen_complementario');
                     $diagnostico->cultivo=$request->get('cultivo');
                    $diagnostico->comentarios=$request->get('comentarios');
                    $diagnostico->aspecto_social=$request->get('aspecto_social');
                     $diagnostico->save();
                     
                     // guardar los datos en la tabla Detallediagnostico
            
                     
                     $detalle_diagnostico = $request->get('detalles');
                     // dd($detalle_diagnostico);

                     if(empty($detalle_diagnostico)){
                    
                   
                      $detalle = new Detallediagnostico;
                      $detalle->iddiagnostico = $diagnostico->iddiagnostico;
                      $detalle->detalle_diagnostico = $detalle_diagnostico;
                      $detalle->estado = 0;  
                      $detalle->save();
                      }
                     else{
                       $cont = 0;

                     while($cont < count($detalle_diagnostico)) {
                      $detalle = new Detallediagnostico;
                      $detalle->iddiagnostico = $diagnostico->iddiagnostico;
                      $detalle->detalle_diagnostico = $detalle_diagnostico[$cont];
                      $detalle->estado = 1;  
                      $detalle->save();
                      $cont= $cont+1;


                       }
                      }

                       // guardar los datos en la tabla medicacion
                      $detalle_medicacion = $request->get('detallesMedicacion');
                      $detalle_dosis = $request->get('detallesDosis');

                      $detalle_fecha = $request->get('detallesFecha');
                    
                      
                      if(empty($detalle_medicacion)){
               
                      $medicacion = new Medicacion;
                      $medicacion->iddiagnostico = $diagnostico->iddiagnostico;
                      $medicacion->medicacion =$detalle_medicacion;
                      $medicacion->dosis = $detalle_dosis;
                      $medicacion->dia_inicio = $detalle_fecha;    
                       $medicacion->estado = 0;                
                      $medicacion->save();
                      }
                      else{
                      $cont = 0;
                      $dias = [];
                      while($cont < count($detalle_medicacion)) {
                     // $dias[$cont]= $dia_adicional + Carbon::parse($detalle_fecha[$cont])->diffInDays($date);
                      $medicacion = new Medicacion;
                      $medicacion->iddiagnostico = $diagnostico->iddiagnostico;
                      $medicacion->medicacion =$detalle_medicacion[$cont];
                      $medicacion->dosis = $detalle_dosis[$cont];
                      $medicacion->dia_inicio = $detalle_fecha[$cont];
                      // $medicacion->dias = $dias[$cont];
                      $medicacion->estado = 1;  
                      $medicacion->save();
                      $cont= $cont+1;

                       }
                     }
                      
                      
                       DB::commit();
                       return redirect()->route('diagnosticos')->with('ingreso','El registro se agrego correctamente');
                      } 
                      catch (\Exception $e) {
                    DB::rollback();
                       } 
                  

                  }


           public function detalleDiagnostico ($iddiagnostico){

   // ------------------Actualizar antes de mostrar------------------------      

            $diagnostico = Diagnostico::find($iddiagnostico);
            // obtener el diagnostico con el id

        // Actualizar evolucion diaria(fechas) del diagnostico y medicacion

             $fecha_entrada =  collect(DB::table('diagnostico')
              ->select('diagnostico.fecha_entrada')
              ->where("iddiagnostico","=",$iddiagnostico)
              ->first())->first();


            // campo fecha de ingreso del diagnostico
          
            // -----fecha actual
             $dia_adicional = 1;
             $fecha_actual = Carbon::now();

            // ---------------------------
            
            // calcular dias de internacion
             $dias_internacion=  $dia_adicional + Carbon::parse($fecha_entrada)->diffInDays($fecha_actual);
               // calcular dias de internacion

             // Guardar los cambios
              $diagnostico->fecha_evolucion=  $fecha_actual;
              $diagnostico->dias_internacion=  $dias_internacion;
              $diagnostico->update();
  // ------------------Actualizar antes de mostrar------------------------      

            $datospaciente = DB::table('diagnostico')
            ->join('pacientes', 'diagnostico.idpaciente', '=', 'pacientes.idpaciente')
            ->select('diagnostico.*', 'pacientes.*')
            ->where("iddiagnostico","=",$iddiagnostico)
            ->first();
       

             $detalles = DB::table('diagnostico')
            ->join('detalle_diagnostico', 'diagnostico.iddiagnostico', '=', 'detalle_diagnostico.iddiagnostico')
            ->select('diagnostico.*','detalle_diagnostico.*')
            ->where("detalle_diagnostico.iddiagnostico","=",$iddiagnostico)
            ->where("detalle_diagnostico.estado", "=", 1)
            ->get();

             $detallesMedicina = DB::table('diagnostico')
            ->join('medicacion', 'diagnostico.iddiagnostico', '=', 'medicacion.iddiagnostico')
            ->select('diagnostico.*','medicacion.*')
            ->where("medicacion.iddiagnostico","=",$iddiagnostico)
            ->where("medicacion.estado", "=", 1)
            ->get();
          

             // direccionar a vista con los detalles del diagnostico
             return view('diagnosticos/detalleDiagnostico',['datospaciente'=>$datospaciente, 
                    'detalles'=> $detalles , 'detallesMedicina'=> $detallesMedicina]);
       

          }

          
        
        public function actualizarDiagnostico ($iddiagnostico){

            // fecha de hoy 
            $date = Carbon::now();

            // Campos de la tabla de diagnostico con los datos del paciente
            $datospaciente = DB::table('diagnostico')
            ->join('pacientes', 'diagnostico.idpaciente', '=', 'pacientes.idpaciente')
            ->select('diagnostico.*', 'pacientes.*')
            ->where("iddiagnostico","=",$iddiagnostico)
            ->first();

             // detalles del diagnostico
              $detalles = DB::table('diagnostico')
            ->join('detalle_diagnostico', 'diagnostico.iddiagnostico', '=', 'detalle_diagnostico.iddiagnostico')
            ->select('diagnostico.*','detalle_diagnostico.*')
            ->where("detalle_diagnostico.iddiagnostico","=",$iddiagnostico)
            ->where("detalle_diagnostico.estado", "=", 1)
            ->get();
            // dd( $detalles);

             $detallesMedicina = DB::table('diagnostico')
            ->join('medicacion', 'diagnostico.iddiagnostico', '=', 'medicacion.iddiagnostico')
            ->select('medicacion.idmedicacion','medicacion.dosis','medicacion.medicacion','medicacion.dia_inicio','medicacion.dias')
            ->where("medicacion.iddiagnostico","=",$iddiagnostico)
            ->where("medicacion.estado", "=", 1)
            ->get();
              
              // dd($detallesMedicina);


          
         return view('diagnosticos/actualizarDiagnostico',['datospaciente'=>$datospaciente,'date'=>$date,'detalles'=>$detalles ,'detallesMedicina'=>$detallesMedicina ]);

          }


            public function modificarDetallesDiagnostico (Detallediagnostico $detalle_diagnostico){
     // cargar formulario para editar datos del paciente 

             $datos = DB::table('detalle_diagnostico')
            ->join('diagnostico', 'detalle_diagnostico.iddiagnostico', '=', 'diagnostico.iddiagnostico')
            ->select('diagnostico.*')
            ->where("detalle_diagnostico.iddetalle_diagnostico","=",$detalle_diagnostico->iddetalle_diagnostico)
            ->first();


            $paciente = Pacientes::find($datos->idpaciente);
       
             // $paciente = Pacientes::find($paciente->$idpaciente);
           
             return view('diagnosticos/modificarDetallesDiagnostico' , ['detalle_diagnostico' => $detalle_diagnostico, 'paciente' => $paciente ,  'datos' => $datos ]) ;


          }
      

         public function updateDiagnostico (FormDataRequest $request,Diagnostico $diagnostico){
          
                    
                     $diagnostico = Diagnostico::find($diagnostico->iddiagnostico);


                  DB::beginTransaction();
                     try {
                     $diagnostico->nrohabitacion=$request->get('nrohabitacion');
                     $diagnostico->nrocama=$request->get('nrocama');
                     $diagnostico->nrohistoria_clinica=$request->get('nrohistoria_clinica');
                     $diagnostico->fecha_entrada=$request->get('fecha_entrada');
                     $diagnostico->bipap=$request->get('bipap');
                     $diagnostico->traqueostomia=$request->get('traqueostomia');
                     $diagnostico->SNG=$request->get('SNG');
                     $diagnostico->sonda_vesical=$request->get('sonda_vesical');
                     $diagnostico->signo_vital_peso=$request->get('signo_vital_peso');
                     $diagnostico->signo_vital_FC=$request->get('signo_vital_FC');
                     $diagnostico->signo_vital_FR=$request->get('signo_vital_FR');
                     $diagnostico->signo_vital_Sat=$request->get('signo_vital_Sat');
                     $diagnostico->signo_vital_temperatura=$request->get('signo_vital_temperatura');
                     $diagnostico->aporte_oral=$request->get('aporte_oral');
                     $diagnostico->examen_fisico=$request->get('examen_fisico');
                    $diagnostico->examen_complementario=$request->get('examen_complementario');
                     $diagnostico->cultivo=$request->get('cultivo');
                    $diagnostico->comentarios=$request->get('comentarios');
                     $diagnostico->aspecto_social=$request->get('aspecto_social');
                     $diagnostico->update();

                      DB::commit();
                      return back()->with('info','El registro se actualizo correctamente');
                      } 
                      catch (\Exception $e) {
                    DB::rollback();
                       } 


          }         


          public function updateDetallediagnostico (DetalleDataRequest $request,Detallediagnostico $detalle_diagnostico){

       
        
           // dd($iddetalle_diagnostico);
             $detallediagnostico = Detallediagnostico::find($detalle_diagnostico->iddetalle_diagnostico);
       


            DB::beginTransaction();
               try {
               $detallediagnostico->detalle_diagnostico=$request->get('detalle_diagnostico');
               $detallediagnostico->update();

                DB::commit();
             

                return redirect()->route('actualizarDiagnostico',[$detalle_diagnostico->iddiagnostico])->with('info','El registro se actualizo correctamente');
                } 
                catch (\Exception $e) {
              DB::rollback();
                 } 

          }

         public function eliminarDiagnostico (Detallediagnostico $detalle_diagnostico){

         
        
             $Detallediagnostico = Detallediagnostico::find($detalle_diagnostico->iddetalle_diagnostico);


              $Detallediagnostico->delete();
               return back()->with('eliminar','El registro se elimino correctamente');          

          }

          
           public function modificarMedicacion (Medicacion $medicacion){
     // cargar formulario para editar datos del paciente 

             $datos = DB::table('medicacion')
            ->join('diagnostico', 'medicacion.iddiagnostico', '=', 'diagnostico.iddiagnostico')
            ->select('diagnostico.*')
            ->where("medicacion.idmedicacion","=",$medicacion->idmedicacion)
            ->first();


            $paciente = Pacientes::find($datos->idpaciente);
       
             // $paciente = Pacientes::find($paciente->$idpaciente);
           
             return view('diagnosticos/modificarMedicacion' , ['medicacion' => $medicacion, 'paciente' => $paciente ,  'datos' => $datos ]) ;


          }


          public function updateMedicacion (MedicacionDataRequest $request,Medicacion $medicacion){

       
        
           // dd($iddetalle_diagnostico);
             $detallemedicacion = Medicacion::find($medicacion->idmedicacion);
       


            DB::beginTransaction();
               try {
               $detallemedicacion->medicacion=$request->get('medicacion');
               $detallemedicacion->dosis=$request->get('dosis');
               $detallemedicacion->dia_inicio=$request->get('dia_inicio');
               $detallemedicacion->dias=$request->get('dias');

               $detallemedicacion->update();

                DB::commit();
             

                return redirect()->route('actualizarDiagnostico',[$medicacion->iddiagnostico])->with('actualizado','El registro se actualizo correctamente');
                } 
                catch (\Exception $e) {
              DB::rollback();
                 } 

          }
      

           public function eliminarMedicacion (Medicacion $medicacion){

         
        
             $detallemedicacion = Medicacion::find($medicacion->idmedicacion);


              $detallemedicacion->delete();
               return back()->with('eliminar','El registro se elimino correctamente');          

          }




           public function pdf($iddiagnostico){

             // ------------------Actualizar antes de mostrar------------------------      

            $diagnostico = Diagnostico::find($iddiagnostico);
            // obtener el diagnostico con el id

        // Actualizar evolucion diaria(fechas) del diagnostico y medicacion

             $fecha_entrada =  collect(DB::table('diagnostico')
              ->select('diagnostico.fecha_entrada')
              ->where("iddiagnostico","=",$iddiagnostico)
              ->first())->first();
    


            // campo fecha de ingreso del diagnostico
          
            // -----fecha actual
             $dia_adicional = 1;
             $fecha_actual = Carbon::now();

            // ---------------------------
            
            // calcular dias de internacion
             $dias_internacion=  $dia_adicional + Carbon::parse($fecha_entrada)->diffInDays($fecha_actual);
     
               // calcular dias de internacion

             // Guardar los cambios
              $diagnostico->fecha_evolucion=  $fecha_actual;
              $diagnostico->dias_internacion=  $dias_internacion;
              $diagnostico->update();
  // ------------------Actualizar antes de mostrar------------------------      

            $datospaciente = DB::table('diagnostico')
            ->join('pacientes', 'diagnostico.idpaciente', '=', 'pacientes.idpaciente')
            ->select('diagnostico.*', 'pacientes.*')
            ->where("iddiagnostico","=",$iddiagnostico)
            ->first();


       

             $detalles = DB::table('diagnostico')
            ->join('detalle_diagnostico', 'diagnostico.iddiagnostico', '=', 'detalle_diagnostico.iddiagnostico')
            ->select('diagnostico.*','detalle_diagnostico.*')
            ->where("detalle_diagnostico.iddiagnostico","=",$iddiagnostico)
            ->where("detalle_diagnostico.estado", "=", 1)
            ->get();

             $detallesMedicina = DB::table('diagnostico')
            ->join('medicacion', 'diagnostico.iddiagnostico', '=', 'medicacion.iddiagnostico')
            ->select('diagnostico.*','medicacion.*')
            ->where("medicacion.iddiagnostico","=",$iddiagnostico)
            ->where("medicacion.estado", "=", 1)
            ->get();
          


           return \PDF::loadView('diagnosticos.pdf',compact('datospaciente', 'detalles', 'detallesMedicina'))
                
                  ->download('evolucion.pdf');
 
          } 

          

          public function agregarDetalleDiagnostico(DiagnosticoDataRequest $request,Diagnostico $diagnostico){
                   
                        
                    $iddiagnostico = $diagnostico->iddiagnostico;

                     DB::beginTransaction();
                     try {
          
                     $diagnostico= new Detallediagnostico;
                     $diagnostico->iddiagnostico= $iddiagnostico;
                     $diagnostico->detalle_diagnostico=$request->get('detalle_diagnostico');
                     $diagnostico->estado = 1; 
                     $diagnostico->save(); 
                      
                       DB::commit();
                       return back()->with('success','El registro se agrego correctamente'); 
                      } 
                      catch (\Exception $e) {
                    DB::rollback();
                       } 
                  

                  }

                 public function agregarNuevaMedicacion (MedicacionDataRequest $request,Diagnostico $diagnostico){
                   
 
                     DB::beginTransaction();
                     try {
          
                     $medicacion= new Medicacion;
                     $medicacion->iddiagnostico=$diagnostico->iddiagnostico;
                     $medicacion->medicacion=$request->get('medicacion');
                     $medicacion->dosis=$request->get('dosis');
                     $medicacion->dia_inicio=$request->get('dia_inicio');
                     $medicacion->estado = 1; 
                     $medicacion->save();
                      
                      
                       DB::commit();
                       return back()->with('success','El registro se agrego correctamente'); 
                      } 
                      catch (\Exception $e) {
                    DB::rollback();
                       } 
                  

                  }







            
}
