<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicacion extends Model
{
   public $table = 'medicacion';
   protected $primaryKey = 'idmedicacion';
   public $timestamps=false;


   protected $fillable = [
       'iddiagnostico','medicacion','dosis','dia_inicio','fecha_fin','dias','estado'

    ]; 

    public function diagnostico(){

        return $this->belongsTo(Diagnostico::class,'iddiagnostico');
    }  //con esta clase decimos que  detalleDiagnostico contiene diagmostico: tablas diagnostico y detalle diagnostico
}
