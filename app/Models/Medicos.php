<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
   public $table = 'medicos'; //renombrar el nombre de la tabla
   protected $primaryKey = 'idmedico'; //renombrar id de la tabla


   protected $fillable = [
        'idrol_usuario','apellido','nombre', 'nombreUsuario' , 'password' , 'estado' 
    ]; 

     public function rolusuario(){

    	return $this->belongsTo(RolUsuario::class);
    }  //con esta clase decimos que un Administrador contiene un rol de usuario: vincular Administrador con rol de usaurio 
}
