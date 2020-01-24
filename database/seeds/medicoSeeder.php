<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\RolUsuario;

class medicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $rolAdminID = DB::table('rol_usuario')
         ->where('descripcion', 'Medico')
         ->value('idrol_usuario');

              // dd($rolAdmin);  mostrar el rol de usuario 

        // consultas con laravel 

          DB::table('medico')->insert([
          'idrol_usuario' =>  $rolAdminID,
          'apellido' => 'Avalos',
          'nombre' => 'Noelia',
          'nombreUsuario' => 'Noe88',
          'password' => bcrypt('noe1234'),
          'estado' => 1,
  
        ]);

           


    }
}
