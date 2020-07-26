<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

// modelos utilizados
use App\Models\Pacientes;  

// validar formularios con datarequest
use App\Http\Requests\PacienteDataRequest;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listar(){
   
      return view('pacienteVUE/list') ;
    }


    public function index(Request $request)
    {
   

      $pacientesvue = DB::table('pacientes')
      ->select('pacientes.*')
      ->where('pacientes.estado', '=', 1)
      ->orderBy('pacientes.apellido', 'asc')
      ->paginate(5);
       // cambiar el controlador para paginar los registos de la tabla 
      // El primer elemento a retornar será un array paginate para el control de la paginación que por medio de la variable $tasks obtenemos los valores del total de registros, página actual, registros por página, última página y primera página.
      return [
        'pagination' => [
            'total'        => $pacientesvue->total(),
            'current_page' => $pacientesvue->currentPage(),
            'per_page'     => $pacientesvue->perPage(),
            'last_page'    => $pacientesvue->lastPage(),
            'from'         => $pacientesvue->firstItem(),
            'to'           => $pacientesvue->lastItem(),
        ],
        'pacientesvue' => $pacientesvue
    ];

     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteDataRequest $request)
    {
         
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
         return;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacienteDataRequest $request, $idpaciente)
    {
     
         $paciente = Pacientes::find($idpaciente);
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
         $paciente->update();
         return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpaciente)
    {
         $paciente = Pacientes::find($idpaciente);
         $paciente->delete();

    }
}
