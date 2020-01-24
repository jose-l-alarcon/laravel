<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class administradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // conctructor de consulta de laravel
        $rolAdminID = DB::table('rol_usuario')
        ->where(['descripcion' => 'Administrador'])
        ->value('idrol_usuario');  //obtener el id de administrador 

         // $rolAdminID = RolUsuario::where('descripcion', 'Administrador')->value('idrol');

              // dd($rolAdmin);  mostrar el rol de usuario 

   // consultas con laravel 
          DB::table('administrador')->insert([
          'idrol_usuario' =>  $rolAdminID,
          'apellido' => 'Alarcon',
          'nombre' => 'Jose Luis',
          'nombreUsuario' => 'Jose09',
          'password' => bcrypt('jose1234'),
           'estado' => 1,
  
        ]);

  
     // llamando al modelo 
    	 // Administrador::create( [
      //     'idrol'  =>  $rolAdminID,
      //     'apellido' => 'Alarcon',
      //     'nombre' => 'Jose Luis',
      //     'nombreUsuario' => 'Jose09',
      //     'password' => bcrypt('jose1234'),
      //     'estado' => 1,
      //      ]);

            // ejemplo de model factory
          // factory(Administrador::class)->create();
    }
}
