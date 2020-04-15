<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('idusuario'); //entero sin signo autoincremental 
            $table->unsignedInteger('idrol_usuario');
            $table->foreign('idrol_usuario')->references('idrol_usuario')->on('rol_usuario');
            $table->string('apellido', 100);
            $table->string('nombre', 100);
            $table->string('username', 50)->unique();
            $table->string('password', 200);
            $table->integer('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()  //eliminar la tabla 
    {
        Schema::dropIfExists('users');
    }
}
