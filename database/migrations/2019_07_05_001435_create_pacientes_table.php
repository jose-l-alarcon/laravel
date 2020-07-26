<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->Increments('idpaciente');
            $table->string('dni', 50);
            $table->string('apellido', 100);
            $table->string('nombre', 100);
            $table->string('genero', 50);
            $table->date('fecha_nacimiento')->nullable();
            $table->string('edad', 15)->nullable();
            $table->string('obra_social', 100)->nullable();
            $table->string('localidad', 100)->nullable();
            $table->string('provincia', 100)->nullable();
            $table->string('hcnum', 100)->nullable();
            $table->integer('estado')->nullable();
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
        Schema::dropIfExists('pacientes');
    }
}
