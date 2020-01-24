<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rol_usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    // constructor de consultas de laravel
    {
         DB::table('rol_usuario')->insert([
          'descripcion' => 'Administrador',
 
        ]);

        DB::table('rol_usuario')->insert([
          'descripcion' => 'Medico',
           ]);
    }
}
