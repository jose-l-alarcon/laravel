<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
   public $table = 'diagnostico'; //renombrar el nombre de la tabla
   protected $primaryKey = 'iddiagnostico'; //renombrar id de la tabla

   public $timestamps=false;


   protected $fillable = [
         'idpaciente','nrohabitacion', 'nrocama' , 'nrohistoria_clinica','fecha_entrada','fecha_evolucion','dias_internacion','bipap' , 'traqueostomia' , 'SNG', 'sonda_vesical','signo_vital_ta','signo_vital_peso','signo_vital_FC', 'signo_vital_FR' , 'signo_vital_Sat' , 'signo_vital_temperatura','balance_ingreso' ,'balance_egreso','balance_balance','balance_flujo', 'aporte_oral ','examen_fisico ','examen_complementario','cultivo','comentarios','aspecto_social','motivoConsulta','estado'
    ]; 


     public function paciente(){

        return $this->belongsTo(Pacientes::class,'idpaciente');
    }  //con esta clase decimos que  detalleDiagnostico contiene diagmostico: tablas diagnostico y detalle diagnostico

  
}
