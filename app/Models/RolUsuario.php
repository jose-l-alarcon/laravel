<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolUsuario extends Model
{
   public $table = 'rol_usuario';
   protected $primaryKey = 'idrol_usuario';
   // public $timestamps = false;  poner en null campo de creacion y ultima actualizacion 

}
