<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;  

class UserController extends Controller
{
    
    public function index(){

    	  $pacientes = Pacientes::orderBy('apellido', 'DESC')->get(); 
            // ordenar pacientes por apellido en forma descendente

     // opcion 3 para pasar variables a una vista 
    	return view('prueba',compact('pacientes')) ;
    }


  


}
