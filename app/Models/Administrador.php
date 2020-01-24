<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{

   public $table = 'administrador'; //renombrar el nombre de la tabla
   protected $primaryKey = 'idadministrador'; //renombrar id de la tabla

   
   protected $fillable = [
        'apellido','nombre','estado',
    ];  

    // protected $fillable los campos especificados permitiran asignar datos masivos: datos repetidos; 

    public function rolusuario(){

    	return $this->belongsTo(RolUsuario::class);
    }  //con esta clase decimos que un Administrador contiene un rol de usuario: vincular Administrador con rol de usaurio 
}
