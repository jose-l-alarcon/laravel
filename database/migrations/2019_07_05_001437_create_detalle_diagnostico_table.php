<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleDiagnosticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_diagnostico', function (Blueprint $table) {
            $table->Increments('iddetalle_diagnostico');
            $table->unsignedInteger('iddiagnostico');
            $table->foreign('iddiagnostico')->references('iddiagnostico')->on('diagnostico');
            $table->longText('detalle_diagnostico')->nullable();
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
        Schema::dropIfExists('detalle_diagnostico');
    }
}
