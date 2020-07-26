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
            $table->string('nrocama', 50)->nullable();
            $table->date('fecha_entrada');
            $table->date('fecha_evolucion')->nullable();
            $table->integer('dias_internacion')->nullable();
            $table->date('dia_egreso')->nullable();
            $table->string('bipap',50 )->nullable();
            $table->string('traqueostomia',50 )->nullable();
            $table->string('SNG',50 )->nullable();
            $table->string('sonda_vesical',250)->nullable();
            $table->string('signo_vital_ta',50 )->nullable();
            $table->string('signo_vital_peso',50 )->nullable();
            $table->string('signo_vital_FC',50 )->nullable();
            $table->string('signo_vital_FR',50 )->nullable();
            $table->string('signo_vital_Sat',50 )->nullable();
            $table->string('signo_vital_temperatura',50)->nullable(); 

            $table->string('balance_ingreso',50)->nullable();
            $table->string('balance_egreso',50)->nullable();
            $table->string('balance_balance',50)->nullable();
            $table->string('balance_flujo',50)->nullable();

            $table->longText('aporte_oral')->nullable();
            $table->longText('examen_fisico')->nullable();
            $table->longText('examen_complementario')->nullable();
            $table->longText('cultivo')->nullable();
            $table->longText('comentarios')->nullable();
            $table->longText('motivoConsulta')->nullable();
            $table->string('oxigeno',50)->nullable();
            $table->integer('estado');
            // $table->longText('aspecto_social')->nullable();

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
