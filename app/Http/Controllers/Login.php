<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicos;  
use Auth;


class Login extends Controller
{
    
    public function login_usuario(){
 
            // return view('admin/admin' , compact('pacientes')) ;
    return view('login/inicio') ;
                 //compact se pasan las variables a las vistas 
      } 


     // public function loginInicio (){
                    
     //           // $this->validate(request()[

     //           //   'nombreUsuario' => 'required|string',
     //           //   'password' => 'required|string',


     //           // ]);  

     //            $credentials = $this->validate(request(),[
                    
     //                  'nombreUsuario' => 'required',
     //                  'password' =>'required',
                     
     //               ]);  

     //            // Auth::attempt($credentials);

     //            return $credentials;

     //    }

         public function iniciarSesion (){

                    $credentials = request()->validate([
                      
                      'nombreUsuario' => 'required',
                      'password' =>'required',
                      
                   ]); 

                   if (Auth::attempt($credentials))
                   {

                   	return 'sesion iniciada';
                   }
                    // el resultado que se obtiene es booleano 
                      
                    return 'error';
                    

        }

       public function username()
    {
        return 'nombreUsuario';
    }

       

}
