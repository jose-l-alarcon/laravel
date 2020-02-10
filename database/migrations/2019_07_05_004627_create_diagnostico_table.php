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
            $table->unsignedInteger('idmedico');
            $table->foreign('idmedico')->references('idmedico')->on('medicos');
            // $table->foreign('idmateria');
            $table->unsignedInteger('idpaciente');
            $table->foreign('idpaciente')->references('idpaciente')->on('pacientes');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('nropiso', 50);
            $table->string('nrohabitacion', 50);
            $table->string('nrocama', 50);
            $table->unsignedInteger('iddetalle_diagnostico');
            $table->foreign('iddetalle_diagnostico')->references('iddetalle_diagnostico')->on('detalle_diagnostico');
            $table->timestamps();
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
