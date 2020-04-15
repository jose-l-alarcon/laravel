<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detallediagnostico extends Model
{
   public $table = 'detalle_diagnostico';
   protected $primaryKey = 'iddetalle_diagnostico';
   public $timestamps=false;


   protected $fillable = [
       'iddiagnostico','detalle_diagnostico','estado'
    ];



    public function diagnostico(){

        return $this->belongsTo(Diagnostico::class,'iddiagnostico');
    }  //con esta clase decimos que  detalleDiagnostico contiene diagmostico: tablas diagnostico y detalle diagnostico

}