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

  // MENSAJES ALERTA
 use RealRashid\SweetAlert\Facades\Alert;
class Administrador extends Controller
     {
    
   public function admin(){
          
    $pacientes = DB::table('pacientes')
      ->select('pacientes.*')
      ->where('pacientes.estado', '=', 1)
      ->orderBy('pacientes.apellido', 'asc')
      ->get();

          return view('admin/admin', compact('pacientes')) ;
   
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
                     $paciente->hcnum=$request->get('hcnum');
                     $paciente->estado=1;
                     $paciente->save();
                       
                       DB::commit();

                          return redirect()->route('Admin')->with('success', 'El paciente se agrego correctamente');
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
                    
                  'dni' => ['required','max:8'],
                  'apellido' => 'required',
                  'nombre' =>'required',
                  'genero' => 'required',
                  'fecha_nacimiento' => 'required',
                  'edad' => 'required',
                  'obra_social' =>['required','max:15'],
                  'localidad' => 'required',
                  'provincia' =>'required',
                   'hcnum' =>'required',
                      
                      // 'fecha_entrada' => 'required',

                    ]); 
               // campos que seran validados y actualizados 
            // actualizar datos del paciente una vez que pasan las validaciones

              $paciente->update($data);

              // redireccionar a la vista admin
               return redirect()->route('Admin')->with('success', 'El registro se actualizo correctamente');

          }



     public function diagnostico(){

          $pacientes = DB::table('pacientes')
          ->select('pacientes.*')
          ->where('pacientes.estado', '=', 1)
          ->orderBy('pacientes.apellido', 'asc')
          ->get();

         $diagnostico = DB::table('diagnostico')
            ->join('pacientes', 'diagnostico.idpaciente', '=', 'pacientes.idpaciente')
            ->select('diagnostico.*', 'pacientes.*')
            ->where('diagnostico.dia_egreso', '=', NULL)
            ->where('diagnostico.estado', '=', 1)
            ->orderBy('apellido', 'asc')
            ->get();
          
            // ordenar pacientes por apellido en forma descendente
            return view('diagnosticos/diagnostico' , compact('diagnostico','pacientes')) ;
 
      }

      public function pacientesEgreso(){

         $diagnostico = DB::table('diagnostico')
            ->join('pacientes', 'diagnostico.idpaciente', '=', 'pacientes.idpaciente')
            ->select('diagnostico.*', 'pacientes.*')
            ->where('diagnostico.dia_egreso', '<>', NULL)
            ->orderBy('apellido', 'asc')
            ->get();
          
            // ordenar pacientes por apellido en forma descendente
            return view('diagnosticos/pacientesEgreso' , compact('diagnostico')) ;
 
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
                     

                     $verificacion = DB::table('diagnostico')
                    ->join('pacientes', 'diagnostico.idpaciente', '=', 'pacientes.idpaciente')
                    ->select('diagnostico.*', 'pacientes.*')
                    ->where ('diagnostico.idpaciente', $paciente->idpaciente)
                    ->where('diagnostico.estado', 1)
                    ->count();
                   
                    
                     if ($verificacion == 1) {

                       return redirect()->route('diagnosticos')->with('warning','Error , este paciente ya esta en su lista de evolución diaria ');

                     }
                     else{

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
                     $diagnostico->fecha_entrada=$fecha_ingreso;
                     $diagnostico->fecha_evolucion= $date;
                     $diagnostico->dias_internacion= $dias_internacion;
                     $diagnostico->bipap=$request->get('bipap');
                     $diagnostico->traqueostomia=$request->get('traqueostomia');
                     $diagnostico->SNG=$request->get('SNG');
                     $diagnostico->sonda_vesical=$request->get('sonda_vesical');
                     $diagnostico->signo_vital_peso=$request->get('signo_vital_peso');
                     $diagnostico->signo_vital_ta=$request->get('signo_vital_ta');
                     $diagnostico->signo_vital_FC=$request->get('signo_vital_FC');
                     $diagnostico->signo_vital_FR=$request->get('signo_vital_FR');
                     $diagnostico->signo_vital_Sat=$request->get('signo_vital_Sat');
                     $diagnostico->signo_vital_temperatura=$request->get('signo_vital_temperatura');
                    $diagnostico->balance_ingreso=$request->get('balance_ingreso');
                    $diagnostico->balance_egreso=$request->get('balance_egreso');
                    $diagnostico->balance_balance=$request->get('balance_balance');
                     $diagnostico->balance_flujo=$request->get('balance_flujo');

                     $diagnostico->aporte_oral=$request->get('aporte_oral');
                     $diagnostico->examen_fisico=$request->get('examen_fisico');
                    $diagnostico->examen_complementario=$request->get('examen_complementario');
                     $diagnostico->cultivo=$request->get('cultivo');
                    $diagnostico->comentarios=$request->get('comentarios');
                     $diagnostico->motivoConsulta=$request->get('motivoConsulta');
                     $diagnostico->estado=1;
  
      
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
                      $medicacion->estado = 1;  
                      $medicacion->save();
                      $cont= $cont+1;

                       }
                     }
                      
                      
                       DB::commit();
                       return redirect()->route('diagnosticos')->with('success','El registro se agrego correctamente');
                      } 


                      catch (\Exception $e) {
                    DB::rollback();
                       }

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
            ->select('medicacion.idmedicacion','medicacion.dosis','medicacion.medicacion','medicacion.dia_inicio','medicacion.fecha_fin','medicacion.dias')
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
                     $diagnostico->fecha_entrada=$request->get('fecha_entrada');
                     $diagnostico->bipap=$request->get('bipap');
                     $diagnostico->traqueostomia=$request->get('traqueostomia');
                     $diagnostico->SNG=$request->get('SNG');
                     $diagnostico->sonda_vesical=$request->get('sonda_vesical');
                     $diagnostico->signo_vital_ta=$request->get('signo_vital_ta');
                     $diagnostico->signo_vital_peso=$request->get('signo_vital_peso');
                     $diagnostico->signo_vital_FC=$request->get('signo_vital_FC');
                     $diagnostico->signo_vital_FR=$request->get('signo_vital_FR');
                     $diagnostico->signo_vital_Sat=$request->get('signo_vital_Sat');
                     $diagnostico->signo_vital_temperatura=$request->get('signo_vital_temperatura');

                      $diagnostico->balance_ingreso=$request->get('balance_ingreso');
                    $diagnostico->balance_egreso=$request->get('balance_egreso');
                    $diagnostico->balance_balance=$request->get('balance_balance');
                     $diagnostico->balance_flujo=$request->get('balance_flujo');

                     $diagnostico->aporte_oral=$request->get('aporte_oral');
                     $diagnostico->examen_fisico=$request->get('examen_fisico');
                    $diagnostico->examen_complementario=$request->get('examen_complementario');
                     $diagnostico->cultivo=$request->get('cultivo');
                    $diagnostico->comentarios=$request->get('comentarios');
                     $diagnostico->motivoConsulta=$request->get('motivoConsulta');
                     $diagnostico->update();

                      DB::commit();
                      return back()->with('success','El registro se actualizo correctamente');
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
             

                return redirect()->route('actualizarDiagnostico',[$detalle_diagnostico->iddiagnostico])->with('success','El registro se actualizo correctamente');
                } 
                catch (\Exception $e) {
              DB::rollback();
                 } 

          }

         public function eliminarDiagnostico (Detallediagnostico $detalle_diagnostico){

         
             $Detallediagnostico = Detallediagnostico::find($detalle_diagnostico->iddetalle_diagnostico);


              $Detallediagnostico->delete();
               return back()->with('info','El registro se elimino correctamente');  

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
               $detallemedicacion->fecha_fin=$request->get('fecha_fin');
               $detallemedicacion->dias=$request->get('dias');

               $detallemedicacion->update();

                DB::commit();
             

                return redirect()->route('actualizarDiagnostico',[$medicacion->iddiagnostico])->with('success','El registro se actualizo correctamente');
                } 
                catch (\Exception $e) {
              DB::rollback();
                 } 

          }
      

           public function eliminarMedicacion (Medicacion $medicacion){

         
        
             $detallemedicacion = Medicacion::find($medicacion->idmedicacion);


              $detallemedicacion->delete();
               return back()->with('info','El registro se elimino correctamente');          

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
          
 
           

           return \PDF::loadView('diagnosticos.pdf',compact('datospaciente', 'detalles', 'detallesMedicina'))->download('evolucion.pdf');
 
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

// --------- controladores para diagnostico con ajax ---------------------

           public function create(){

             return view('diagnosticos.create'); 

            }

            
            public function store(DetalleDataRequest $request){
               
          
             if($request->ajax()){

               $diagnostico= new Detallediagnostico;
               $diagnostico->iddiagnostico= $request->get('product_id');
               $diagnostico->detalle_diagnostico=$request->get('detalle_diagnostico');
               $diagnostico->estado = 1; 
               $diagnostico->save(); 

               // enviar respuesta con el mensaje de exito success y ademas la variable diagnostico para actualizar los datos de la tabla

               return response()->json(['success'=>'El diagnóstico se agrego con éxito', 'diagnostico' => $diagnostico]);
             }
                         

            }


           public function storeMedicacion(MedicacionDataRequest $request){
               
          
             if($request->ajax()){


               $medicacion= new Medicacion;
               $medicacion->iddiagnostico=$request->get('medicacion_id');
               $medicacion->medicacion=$request->get('medicacion');
               $medicacion->dosis=$request->get('dosis');
               $medicacion->dia_inicio=$request->get('dia_inicio');
               $medicacion->fecha_fin=$request->get('fecha_fin');
               $medicacion->dias=$request->get('dias');
               $medicacion->estado = 1; 
               $medicacion->save();

               return response()->json(['success'=>'La medicación se agrego con éxito']);
             }
                         

            }


             
           public function listarDiagnosticos(Request $request){
              
              $diagnosticoLista= $request->get('diagnostico');

             $diagnosticos = DB::table('diagnostico')
            ->join('detalle_diagnostico', 'diagnostico.iddiagnostico', '=', 'detalle_diagnostico.iddiagnostico')
            ->select('diagnostico.*','detalle_diagnostico.*')
            ->where("detalle_diagnostico.iddiagnostico","=", $diagnosticoLista)
            ->where("detalle_diagnostico.estado", "=", 1)
            ->get();
            
              // consulta para traer los detalles de diagnostico 

              return response()->json($diagnosticos);

            }

            // abrir ventana modal con el diagnostico a actualizar      
            public function edit ($iddetalle_diagnostico){
            
              $detallediagnostico = Detallediagnostico::find($iddetalle_diagnostico);

               return response()->json($detallediagnostico);
              
            }


          // actualizar detalle de diagnostico de la ventana modal
         public function updateDetalle(Request $request){
               
           
            $id = $request->get('iddetalle_diagnostico');
           
            $detallediagnostico = Detallediagnostico::find($id);
       

             if($request->ajax()){
         
               $detallediagnostico->detalle_diagnostico=$request->get('detalle');
               $detallediagnostico->update();

               // enviar respuesta con el mensaje de exito success y ademas la variable diagnostico para actualizar los datos de la tabla

               return response()->json(['success'=>'El diagnóstico actualizo con éxito']);
             }
                         

            }

// ----------------------FUNCIONES CRUD AJAX-------------------------------------

                 public function agregarNuevaMedicacion (MedicacionDataRequest $request,Diagnostico $diagnostico){
                   
 
                     DB::beginTransaction();
                     try {
          
                     $medicacion= new Medicacion;
                     $medicacion->iddiagnostico=$diagnostico->iddiagnostico;
                     $medicacion->medicacion=$request->get('medicacion');
                     $medicacion->dosis=$request->get('dosis');
                     $medicacion->dia_inicio=$request->get('dia_inicio');
                     $medicacion->fecha_fin=$request->get('fecha_fin');
                     $medicacion->dias=$request->get('dias');
                     $medicacion->estado = 1; 
                     $medicacion->save();
                      
                      
                       DB::commit();
                       return back()->with('success','El registro se agrego correctamente'); 
                      } 
                      catch (\Exception $e) {
                    DB::rollback();
                       } 
                  

                  }


          public function altaEvolucion ($iddiagnostico){

            // Campos de la tabla de diagnostico con los datos del paciente
            $datospaciente = DB::table('diagnostico')
            ->join('pacientes', 'diagnostico.idpaciente', '=', 'pacientes.idpaciente')
            ->select('diagnostico.*', 'pacientes.*')
            ->where("iddiagnostico","=",$iddiagnostico)
            ->first();


          
         return view('diagnosticos/altaEvolucion',['datospaciente'=>$datospaciente]);

          }


          
           public function egreso (Diagnostico $diagnostico){
                  
                 
         
                 $date = Carbon::now();

                  DB::beginTransaction();
                     try {

                     // cambiar estado del diagnostico a inactivo

                    $datospaciente = DB::table('diagnostico')
                    ->join('pacientes', 'diagnostico.idpaciente', '=', 'pacientes.idpaciente')
                    ->select('diagnostico.*', 'pacientes.*')
                    ->where("iddiagnostico","=",$diagnostico->iddiagnostico)
                    ->update(['diagnostico.dia_egreso' => $date , 'diagnostico.estado' => 0 , 'pacientes.estado' => 0]);
 
 
                      DB::commit();
                  return redirect()->route('diagnosticos')->with('success','El paciente fue dado de alta con exito');


                      } 
                      catch (\Exception $e) {
                    DB::rollback();
                       } 


          }         







            
}
