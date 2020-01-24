<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministradorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrador', function (Blueprint $table) {
            $table->Increments('idadministrador');
             $table->unsignedInteger('idrol_usuario');
         $table->foreign('idrol_usuario')->references('idrol_usuario')->on('rol_usuario');
            $table->string('apellido', 100);
            $table->string('nombre', 100);
            $table->string('nombreUsuario', 50)->unique();
            $table->string('password', 200);
            $table->integer('estado');
            // $table->unsignedInteger('idrol');
            // $table->foreign('idrol');
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
        Schema::dropIfExists('administrador');
    }
}
