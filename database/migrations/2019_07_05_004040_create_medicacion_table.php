<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicacion', function (Blueprint $table) {
            $table->Increments('idmedicacion'); 
            $table->unsignedInteger('iddiagnostico');
            $table->foreign('iddiagnostico')->references('iddiagnostico')->on('diagnostico');
            $table->string('medicacion', 250)->nullable();
            $table->string('dosis', 250)->nullable();
            $table->date('dia_inicio')->nullable();  
            $table->integer('dias')->nullable();
            $table->integer('estado');
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
        Schema::dropIfExists('medicacion');
    }
}
