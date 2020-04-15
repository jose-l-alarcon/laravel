<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostico', function (Blueprint $table) {
            $table->Increments('iddiagnostico');
            $table->unsignedInteger('idpaciente');
            $table->foreign('idpaciente')->references('idpaciente')->on('pacientes');
            $table->string('nrohabitacion', 50);
            $table->string('nrocama', 50);
            $table->string('nrohistoria_clinica', 50);
            $table->date('fecha_entrada');
            $table->date('fecha_evolucion')->nullable();
            $table->integer('dias_internacion')->nullable();
            $table->string('bipap',50 );
            $table->string('traqueostomia',50 );
            $table->string('SNG',50 );
            $table->string('sonda_vesical',50 );
            $table->string('signo_vital_peso',50 );
            $table->string('signo_vital_FC',50 );
            $table->string('signo_vital_FR',50 );
            $table->string('signo_vital_Sat',50 );
            $table->string('signo_vital_temperatura',50);   
            $table->longText('aporte_oral');
            $table->longText('examen_fisico');
            $table->longText('examen_complementario');
            $table->longText('cultivo');
            $table->longText('comentarios');
            $table->longText('aspecto_social');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnostico');
    }
}
