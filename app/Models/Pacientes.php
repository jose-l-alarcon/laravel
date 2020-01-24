<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
   
   public $table = 'pacientes'; //renombrar el nombre de la tabla
   protected $primaryKey = 'idpaciente'; //renombrar id de la tabla


   protected $fillable = [
        'dni','apellido','nombre', 'genero' , 'fecha_nacimiento' , 'edad' , 'obra_social', 'localidad', 'provincia', 'fecha_entrada'
    ]; 

     // protected $guarded = ['idalumno'];
    // protected $fillable = [
    //     'apellido','nombre','estado',
    // ];  

}
