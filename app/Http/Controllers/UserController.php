<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(){

    	if (request()->has('empty')){

    		$users = [];
    	}
       else 
              {

    	$users= ['jose','alarcon'];
    	
         }
         
         $titulo= 'Listado de prueba 3';

    
   // opcion 1 para pasar variables a una vista 
    	// return view('prueba', [ 'users' => $users ,
     //                            'titulo' => 'Listado de prueba 1'
     //   ]);
  

        // opcion 2 para pasar variables a una vista 
    	// return view('prueba') ->with ('users', $users)
     //                          ->with ('titulo', $titulo);

     // opcion 3 para pasar variables a una vista 
    	return view('prueba',compact('users','titulo')) ;
    }


     public function admin(){

            return view('admin/admin') ;
    }




}
